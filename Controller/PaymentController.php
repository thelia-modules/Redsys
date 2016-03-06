<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia 2 Redsys payment module                                               */
/*                                                                                   */
/*      Copyright (c) CQFDev                                                         */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*************************************************************************************/

namespace Redsys\Controller;

use Redsys\Api\Messages;
use Redsys\Api\RedsysApi;
use Redsys\Redsys;
use Thelia\Core\HttpFoundation\Response;
use Thelia\Model\OrderQuery;
use Thelia\Module\BasePaymentModuleController;

/**
 * Redsys payment module
 *
 * @author Franck Allimant <franck@cqfdev.fr>
 */
class PaymentController extends BasePaymentModuleController
{
    protected function getModuleCode()
    {
        return Redsys::MODULE_DOMAIN;
    }

    /**
     * Send the payment notification email to the shop admin
     *
     * @param int $orderId
     * @param string $orderReference
     * @param string $paymentStatus
     * @param string $redsysMessage
     */
    protected function sendPaymentNotification($orderId, $orderReference, $paymentStatus, $redsysMessage)
    {
        $this->getMailer()->sendEmailToShopManagers(
            Redsys::NOTIFICATION_MESSAGE_NAME,
            [
                'order_ref' => $orderReference,
                'order_id' => $orderId,
                'redsys_payment_status' => $paymentStatus,
                'redsys_message' => $redsysMessage
            ]
        );
    }

    /**
     * Process a Redsys platform request
     */
    public function processRedsysRequest()
    {
        // The response code to the server
        $request = $this->getRequest();

        $this->getLog()->info(
            $this->getTranslator()->trans(
                "Redsys platform request received.",
                [],
                Redsys::MODULE_DOMAIN
            )
        );
        
        $this->getLog()->debug(
            $this->getTranslator()->trans(
                "Request parameters: " . print_r($request->request->all(), 1),
                [],
                Redsys::MODULE_DOMAIN
            )
        );

        $orderId = 0;
        $orderReference = $this->getTranslator()->trans('UNDEFINED', [], Redsys::MODULE_DOMAIN);
        $orderStatus = $this->getTranslator()->trans('UNKNOWN', [], Redsys::MODULE_DOMAIN);

        try {
            $redsysApi = new RedsysApi();

            $params = $request->get("Ds_MerchantParameters");
            $jsonResponseData = $redsysApi->decodeMerchantParameters($params);
            $remoteSignature = $request->get("Ds_Signature");

            $this->getLog()->debug(
                $this->getTranslator()->trans(
                    "Decoded merchant parameters: " . print_r($jsonResponseData, 1),
                    [],
                    Redsys::MODULE_DOMAIN
                )
            );

            $signature = $redsysApi->createMerchantSignatureNotif(
                Redsys::getConfigValue('clave'),
                $params
            );

            // Check signature
            if ($signature === $remoteSignature) {
                $orderStatus = $this->getTranslator()->trans('NOT PAID', [], Redsys::MODULE_DOMAIN);

                // Signature is OK, check error
                $error = $redsysApi->getParameter('Ds_ErrorCode');

                if (empty($error)) {
                    // No error, check response
                    $response = $redsysApi->getParameter('Ds_Response');

                    if (intval($response) >= 0 && (intval($response) <= 99 || intval($response) == 900)) {
                        $transactionRef = $redsysApi->getParameter('Ds_Order');

                        if (null !== $order = OrderQuery::create()->findOneByTransactionRef($transactionRef)) {
                            $orderId = $order->getId();
                            $orderReference = $order->getRef();

                            $orderStatus = $this->getTranslator()->trans('PAID', [], Redsys::MODULE_DOMAIN);

                            if ( ! $order->isPaid()) {
                                $this->confirmPayment($order->getId());

                                $message = $this->getTranslator()->trans(
                                    "Order ID %id is confirmed.",
                                    ['%id' => $order->getId()],
                                    Redsys::MODULE_DOMAIN
                                );
                            } else {
                                $message = $this->getTranslator()->trans(
                                    "Order ID %id already paid, message ignored.",
                                    ['%id' => $order->getId()],
                                    Redsys::MODULE_DOMAIN
                                );
                            }
                        } else {
                            $message = $this->getTranslator()->trans(
                                "No order found for transaction reference '%ref'.",
                                ['%ref' => $transactionRef],
                                Redsys::MODULE_DOMAIN
                            );
                        }
                    } else {
                        if (null !== $tpvMessage = Messages::getByCode($response)) {
                            $message = $this->getTranslator()->trans(
                                "Response code is transaction denied %response: %message",
                                [
                                    '%response' => $response,
                                    '%message'  => $tpvMessage
                                ],
                                Redsys::MODULE_DOMAIN
                            );
                        } else {
                            $message = $this->getTranslator()->trans(
                                "Response code is unknown %response",
                                [
                                    '%response' => $response,
                                ],
                                Redsys::MODULE_DOMAIN
                            );
                        }
                    }
                } else {
                    if (null !== $tpvMessage = Messages::getByCode($error)) {
                        $message = $this->getTranslator()->trans(
                            "TPV returned error code %error: %message",
                            [
                                '%error'   => $error,
                                '%message' => $tpvMessage
                            ],
                            Redsys::MODULE_DOMAIN
                        );
                    } else {
                        $message = $this->getTranslator()->trans(
                            "TPV returned unknown error code '%error'",
                            [
                                '%error' => $error,
                            ],
                            Redsys::MODULE_DOMAIN
                        );
                    }
                }
            } else {
                $message = $this->getTranslator()->trans(
                    "Request parameters signature verification failed.",
                    [],
                    Redsys::MODULE_DOMAIN
                );
            }
        } catch (\Exception $ex) {
            $message = $this->getTranslator()->trans(
                "Exception while processing Redsys request: %ex",
                [ '%ex' => $ex->getMessage() ],
                Redsys::MODULE_DOMAIN
            );
        }

        $this->getLog()->info($message);

        $this->sendPaymentNotification($orderId, $orderReference, $orderStatus, $message);

        return Response::create('');
    }

    public function processRedsysSuccessfulRequest()
    {
        $url = $this->getRouteFromRouter(
            'router.front',
            'order.placed',
            [ 'order_id' => intval($this->getRequest()->get('ref')) ]
        );

        return $this->generateRedirect($url);
    }

    public function processRedsysRejectedRequest()
    {
        $url = $this->getRouteFromRouter(
            'router.front',
            'order.failed',
            [
                'order_id' => intval($this->getRequest()->get('ref')),
                'message' => $this->getTranslator()->trans("Your payment was rejected.", [], Redsys::MODULE_DOMAIN)
            ]
        );

        return $this->generateRedirect($url);
    }
}
