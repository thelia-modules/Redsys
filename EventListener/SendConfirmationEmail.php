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

namespace Redsys\EventListener;

use Redsys\Redsys;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Thelia\Action\BaseAction;
use Thelia\Core\Event\Order\OrderEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Core\Template\ParserInterface;
use Thelia\Log\Tlog;
use Thelia\Mailer\MailerFactory;
use Thelia\Model\ConfigQuery;

/**
 * Redsys payment module
 *
 * @author Franck Allimant <franck@cqfdev.fr>
 */
class SendConfirmationEmail extends BaseAction implements EventSubscriberInterface
{
    /** @var MailerFactory */
    protected $mailer;

    /** @var  EventDispatcherInterface */
    protected $dispatcher;

    /**
     * SendConfirmationEmail constructor.
     *
     * @param MailerFactory $mailer
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(MailerFactory $mailer, EventDispatcherInterface $dispatcher)
    {
        $this->mailer = $mailer;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Checks if we are the payment module for the order, and if the order is paid,
     * then send a confirmation email to the customer.
     *
     * @param OrderEvent $event
     * @throws \Exception
     */
    public function updateOrderStatus(OrderEvent $event)
    {
        $redsys = new Redsys();

        if ($event->getOrder()->isPaid() && $redsys->isPaymentModuleFor($event->getOrder())) {
            $contact_email = ConfigQuery::read('store_email', false);

            Tlog::getInstance()->debug(
                "Order ".$event->getOrder()->getRef().": sending confirmation email from store contact e-mail $contact_email"
            );

            if ($contact_email) {
                $order = $event->getOrder();

                $this->mailer->sendEmailToCustomer(
                    Redsys::CONFIRMATION_MESSAGE_NAME,
                    $order->getCustomer(),
                    [
                        'order_id' => $order->getId(),
                        'order_ref' => $order->getRef()
                    ]
                );

                Tlog::getInstance()->debug("Order ".$order->getRef().": confirmation email sent to customer.");

                if (Redsys::getConfigValue('send_confirmation_email_on_successful_payment', false)) {
                    // Send now the order confirmation email to the customer
                    $this->dispatcher->dispatch(TheliaEvents::ORDER_SEND_CONFIRMATION_EMAIL, $event);
                }
            }
        } else {
            Tlog::getInstance()->debug(
                "Order ".$event->getOrder()->getRef().": no confirmation email sent (order not paid, or not the proper payment module)."
            );
        }
    }

    /**
     * Send the confirmation message only if the order is paid.
     *
     * @param OrderEvent $event
     */
    public function checkSendOrderConfirmationMessageToCustomer(OrderEvent $event)
    {
        if (Redsys::getConfigValue('send_confirmation_email_on_successful_payment', false)) {
            $redsys = new Redsys();

            if ($redsys->isPaymentModuleFor($event->getOrder())) {
                if (!$event->getOrder()->isPaid()) {
                    $event->stopPropagation();
                }
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            TheliaEvents::ORDER_UPDATE_STATUS => array("updateOrderStatus", 128),
            TheliaEvents::ORDER_SEND_CONFIRMATION_EMAIL => array("checkSendOrderConfirmationMessageToCustomer", 150)
        );
    }
}
