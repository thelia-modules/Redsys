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

namespace Redsys;

use Propel\Runtime\Connection\ConnectionInterface;
use Redsys\Api\RedsysApi;
use Thelia\Core\HttpFoundation\Response;
use Thelia\Core\Translation\Translator;
use Thelia\Log\Tlog;
use Thelia\Model\Message;
use Thelia\Model\MessageQuery;
use Thelia\Model\ModuleImageQuery;
use Thelia\Model\Order;
use Thelia\Module\AbstractPaymentModule;
use Thelia\Tools\URL;

/**
 * Redsys payment module
 *
 * @author Franck Allimant <franck@cqfdev.fr>
 */
class Redsys extends AbstractPaymentModule
{
    /** The module domain for internationalisation */
    const MODULE_DOMAIN = "redsys";

    /** The confirmation message identifier */
    const CONFIRMATION_MESSAGE_NAME = 'redsys_payment_confirmation';

    // Liste des variables retournées par redsys
    const PARAMETRES_RETOUR = 'montant:M;ref:R;auto:A;trans:T;erreur:E;sign:K';

    /** The notification of payment confirmation */
    const NOTIFICATION_MESSAGE_NAME = 'redsys_payment_status_notification';

    /**
     * @inheritdoc
     */
    public function postActivation(ConnectionInterface $con = null)
    {
        // Create payment confirmation message from templates, if not already defined
        $email_templates_dir = __DIR__ . DS . 'I18n' . DS . 'email-templates' . DS;

        if (null === MessageQuery::create()->findOneByName(self::CONFIRMATION_MESSAGE_NAME)) {
            $message = new Message();

            $message
                ->setName(self::CONFIRMATION_MESSAGE_NAME)

                ->setLocale('en_US')
                ->setTitle('Redsys payment confirmation')
                ->setSubject('Payment of order {$order_ref}')
                ->setHtmlMessage(file_get_contents($email_templates_dir . 'en.html'))
                ->setTextMessage(file_get_contents($email_templates_dir . 'en.txt'))

                ->setLocale('fr_FR')
                ->setTitle('Confirmation de paiement par Redsys')
                ->setSubject('Confirmation du paiement de votre commande {$order_ref}')
                ->setHtmlMessage(file_get_contents($email_templates_dir . 'fr.html'))
                ->setTextMessage(file_get_contents($email_templates_dir . 'fr.txt'))
                ->save();
        }

        if (null === MessageQuery::create()->findOneByName(self::NOTIFICATION_MESSAGE_NAME)) {
            $message = new Message();

            $message
                ->setName(self::NOTIFICATION_MESSAGE_NAME)

                ->setLocale('en_US')
                ->setTitle('Redsys payment status notification')
                ->setSubject('Redsys payment status for order {$order_ref}: {$redsys_payment_status}')
                ->setHtmlMessage(file_get_contents($email_templates_dir . 'notification-en.html'))
                ->setTextMessage(file_get_contents($email_templates_dir . 'notification-en.txt'))

                ->setLocale('fr_FR')
                ->setTitle('Notification du résultat d\'un paiement par Redsys')
                ->setSubject('Résultats du paiement Redsys de la commande {$order_ref} : {$redsys_payment_status}')
                ->setHtmlMessage(file_get_contents($email_templates_dir . 'notification-fr.html'))
                ->setTextMessage(file_get_contents($email_templates_dir . 'notification-fr.txt'))
                ->save();
        }

        /* Deploy the module's image */
        $module = $this->getModuleModel();

        if (ModuleImageQuery::create()->filterByModule($module)->count() == 0) {
            $this->deployImageFolder($module, sprintf('%s'.DS.'images', __DIR__), $con);
        }
    }

    /**
     * @inheritdoc
     */
    public function destroy(ConnectionInterface $con = null, $deleteModuleData = false)
    {
        // Delete config table and messages if required
        if ($deleteModuleData) {
            MessageQuery::create()->findOneByName(self::CONFIRMATION_MESSAGE_NAME)->delete($con);
            MessageQuery::create()->findOneByName(self::NOTIFICATION_MESSAGE_NAME)->delete($con);
        }
    }

    /**
     *  Method used by payment gateway.
     *
     *  If this method return a \Thelia\Core\HttpFoundation\Response instance, this response is sent to the
     *  browser.
     *
     *  In many cases, it's necessary to send a form to the payment gateway.
     *  On your response you can return this form already completed, ready to be sent
     *
     * @param  Order $order processed order
     * @return Response the HTTP response
     */
    public function pay(Order $order)
    {
        return $this->doPay($order);
    }

    /**
     * Payment gateway invocation
     *
     * @param  Order $order processed order
     * @return Response the HTTP response
     */
    protected function doPay(Order $order)
    {
        if ('TEST' == Redsys::getConfigValue('mode', false)) {
            $platformUrl = Redsys::getConfigValue('bank_server_test_url', false);
        } else {
            $platformUrl = Redsys::getConfigValue('bank_server_url', false);
        }

        // Be sure to have a valid platform URL, otherwise give up
        if (false === $platformUrl) {
            throw new \InvalidArgumentException(
                Translator::getInstance()->trans(
                    "The platform URL is not defined, please check Redsys module configuration.",
                    [],
                    Redsys::MODULE_DOMAIN
                )
            );
        }

        // Generate a transaction ID
        $transactionId = sprintf("%010d", $order->getId());

        $order->setTransactionRef($transactionId)->save();

        $currencyCode = $this->getCurrencyIso4217NumericCode($order->getCurrency()->getCode());

        $orderTotal = round(100 * $order->getTotalAmount());

        /*
        Possible transaction types :
             0 ? Autorización
             1 ? Preautorización
             2 ? Confirmación de preautorización
             3 ? Devolución Automática
             5 ? Transacción Recurrente
             6 ? Transacción Sucesiva
             7 ? Pre-autenticación
             8 ? Confirmación de pre-autenticación
             9 ? Anulación de Preautorización
             O ? Autorización en diferido
             P? Confirmación de autorización en diferido
             Q - Anulación de autorización en diferido
             R ? Cuota inicial diferido
             S? Cuota sucesiva diferido
         */

        $transactionType = 0;

        $redsysApi = new RedsysApi();

        // Se Rellenan los campos
        $redsysApi->setParameter("DS_MERCHANT_AMOUNT", $orderTotal);
        $redsysApi->setParameter("DS_MERCHANT_ORDER", strval($transactionId));
        $redsysApi->setParameter("DS_MERCHANT_MERCHANTCODE", Redsys::getConfigValue('codigo_comercio'));
        $redsysApi->setParameter("DS_MERCHANT_CURRENCY", $currencyCode);
        $redsysApi->setParameter("DS_MERCHANT_TRANSACTIONTYPE", $transactionType);
        $redsysApi->setParameter("DS_MERCHANT_CONSUMERLANGUAGE", $this->getLangCode($order->getLang()->getLocale()));
        $redsysApi->setParameter("DS_MERCHANT_TERMINAL", Redsys::getConfigValue('terminal'));
        $redsysApi->setParameter("DS_MERCHANT_MERCHANTURL", Redsys::getConfigValue('callback_url'));
        $redsysApi->setParameter("DS_MERCHANT_URLOK", URL::getInstance()->absoluteUrl(Redsys::getConfigValue('success_return_url'), [ 'ref' => $order->getId() ]));
        $redsysApi->setParameter("DS_MERCHANT_URLKO", URL::getInstance()->absoluteUrl(Redsys::getConfigValue('failure_return_url'), [ 'ref' => $order->getId() ]));

        // Datos de configuración
        $version = "HMAC_SHA256_V1";

        $params = $redsysApi->createMerchantParameters();

        $signature = $redsysApi->createMerchantSignature(Redsys::getConfigValue('clave'));

        $redsysParams = [
            "Ds_SignatureVersion" => $version,
            'Ds_MerchantParameters'  => $params,
            'Ds_Signature' => $signature
        ];

        return $this->generateGatewayFormResponse($order, $platformUrl, $redsysParams);
    }

    /**
     * @return boolean true to allow usage of this payment module, false otherwise.
     */
    public function isValidPayment()
    {
        $valid = false;

        $mode = Redsys::getConfigValue('mode', false);

        // If we're in test mode, do not display Redsys on the front office, except for allowed IP addresses.
        if ('TEST' == $mode) {
            $raw_ips = explode("\n", Redsys::getConfigValue('allowed_ip_list', ''));

            $allowed_client_ips = array();

            foreach ($raw_ips as $ip) {
                $allowed_client_ips[] = trim($ip);
            }

            $client_ip = $this->getRequest()->getClientIp();

            $valid = in_array($client_ip, $allowed_client_ips);
        } elseif ('PRODUCTION' == $mode) {
            $valid = true;
        }

        if ($valid) {
            // Check if total order amount is in the module's limits
            $valid = $this->checkMinMaxAmount();
        }

        return $valid;
    }

    /**
     * Check if total order amount is in the module's limits
     *
     * @return bool true if the current order total is within the min and max limits
     */
    protected function checkMinMaxAmount()
    {
        // Check if total order amount is in the module's limits
        $order_total = $this->getCurrentOrderTotalAmount();

        $min_amount = Redsys::getConfigValue('minimum_amount', 0);
        $max_amount = Redsys::getConfigValue('maximum_amount', 0);

        return $order_total > 0
            &&
            ($min_amount <= 0 || $order_total >= $min_amount)
            &&
            ($max_amount <= 0 || $order_total <= $max_amount);
    }

    /**
     * Get the numeric ISO 4217 code of a currency
     *
     * @param string $textCurrencyCode currency textual code, like EUR or USD
     * @return string the algorithm
     * @throw \RuntimeException if no algorithm was found.
     */

    protected function getCurrencyIso4217NumericCode($textCurrencyCode)
    {
        $currencies = null;

        $localIso417data = __DIR__ . DS . "Config" . DS . "iso4217.xml";

        $currencyXmlDataUrl = "http://www.currency-iso.org/dam/downloads/lists/list_one.xml";

        $xmlData = @file_get_contents($currencyXmlDataUrl);

        try {
            $currencies = new \SimpleXMLElement($xmlData);

            // Update the local currencies copy.
            @file_put_contents($localIso417data, $xmlData);
        } catch (\Exception $ex) {
            Tlog::getInstance()->warning("Failed to get currency XML data from $currencyXmlDataUrl: ".$ex->getMessage());
            try {
                $currencies = new \SimpleXMLElement(@file_get_contents($localIso417data));
            } catch (\Exception $ex) {
                Tlog::getInstance()->warning("Failed to get currency XML data from local copy $localIso417data: ".$ex->getMessage());
            }
        }

        if (null !== $currencies) {
            foreach ($currencies->CcyTbl->CcyNtry as $country) {
                if ($country->Ccy == $textCurrencyCode) {
                    return (string) $country->CcyNbr;
                }
            }
        }

        // Last chance
        switch ($textCurrencyCode) {
            case 'USD':
                return 840;
            case 'GBP':
                return 826;
                break;
            case 'EUR':
                return 978;
                break;
        }

        throw new \RuntimeException(
            Translator::getInstance()->trans(
                "Failed to get ISO 4217 data for currency %curr, payment is not possible.",
                ['%curr' => $textCurrencyCode]
            )
        );
    }
    
    protected function getLangCode($locale)
    {
        switch(substr($locale, 0, 2)) {
            case 'es':
                return '001';
                break;
            case 'en':
                return '002';
                break;
            case 'ca':
                return '003';
                break;
            case 'fr':
                return '004';
                break;
            case 'de':
                return '005';
                break;
            case 'nl':
                return '006';
                break;
            case 'it':
                return '007';
                break;
            case 'sv':
                return '008';
                break;
            case 'pt':
                return '009';
                break;
            case 'pl':
                return '011';
                break;
            case 'gl':
                return '012';
                break;
            case 'eu':
                return '013';
                break;
            default:
                return '002';
        }
    }
}
