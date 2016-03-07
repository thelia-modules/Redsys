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

namespace Redsys\Form;

use Redsys\Redsys;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url as UrlValidator;
use Thelia\Form\BaseForm;
use Thelia\Tools\URL;

/**
 * Redsys payment module
 *
 * @author Franck Allimant <franck@cqfdev.fr>
 */
class ConfigurationForm extends BaseForm
{
    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                'nombre_comercio',
                'text',
                [
                    'constraints' => [new NotBlank()],
                    'label' => $this->translator->trans('Shop name', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('nombre_comercio', '1234567'),
                    'label_attr' => [
                        'for' => 'numero_site',
                        'help' => $this->translator->trans('The shop name (nombre_comercio), as provided by Redsys', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'codigo_comercio',
                'text',
                [
                    'constraints' => [ new NotBlank() ],
                    'label' => $this->translator->trans('Shop identifier', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('codigo_comercio', '1234567'),
                    'label_attr' => [
                        'for' => 'rang_site',
                        'help' => $this->translator->trans('The shop identifier (codigo_comercio), as provided by Redsys', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'terminal',
                'text',
                [
                    'constraints' => [ new NotBlank() ],
                    'label' => $this->translator->trans('Terminal number', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('terminal', '123456789'),
                    'label_attr' => [
                        'for' => 'identifiant_interne',
                        'help' => $this->translator->trans('The payment terminal number, as provided by Redsys', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'clave',
                'text',
                array(
                    'constraints' => [ new NotBlank() ],
                    'label' => $this->translator->trans('Secret key', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('clave', ''),
                    'label_attr' => [
                        'for' => 'clef_privee',
                        'help' => $this->translator->trans('Your secret key (clave - choose the SHA-256 one), as provided by Redsys', [], Redsys::MODULE_DOMAIN)
                    ]
                )
            )
            ->add(
                'bank_server_url',
                'url',
                [
                    'constraints' => [ new NotBlank(), new UrlValidator() ],
                    'label' => $this->translator->trans('Redsys server production URL', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('bank_server_url', "https://sis.redsys.es/sis/realizarPago"),
                    'label_attr' => [
                       'for' => 'bank_server_url',
                        'help' => $this->translator->trans('The Redsys transaction server URL used in production', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'bank_server_test_url',
                'url',
                [
                    'constraints' => [ new NotBlank(), new UrlValidator() ],
                    'label' => $this->translator->trans('Redsys server test URL', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('bank_server_test_url', "https://sis-t.redsys.es:25443/sis/realizarPago"),
                    'label_attr' => [
                        'for' => 'bank_server_test_url',
                        'help' => $this->translator->trans('The Redsys transaction server complete URL used during tests', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'success_return_url',
                'text',
                [
                    'constraints' => [ new NotBlank() ],
                    'label' => $this->translator->trans('Return path after a successful payment', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('success_return_url', '/redsys/success'),
                    'label_attr' => [
                        'for' => 'success_return_url',
                        'help' => $this->translator->trans('Absolute path (without hostname) of the page displayed to your customer if its payement is successful', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'failure_return_url',
                'text',
                [
                    'constraints' => [ new NotBlank(), new UrlValidator() ],
                    'label' => $this->translator->trans('Return path if payment fails', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('failure_return_url', '/redsys/rejected'),
                    'label_attr' => [
                        'for' => 'failure_return_url',
                        'help' => $this->translator->trans('Absolute path (without hostname) of the page displayed to your customer if its payement is not successful', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'callback_url',
                'url',
                [
                    'constraints' => [ new NotBlank(), new UrlValidator() ],
                    'label' => $this->translator->trans('URL de retour', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('callback_url', URL::getInstance()->absoluteUrl('/redsys/callback')),
                    'label_attr' => [
                        'for' => 'callback_url',
                        'help' => $this->translator->trans('URL called by the Redsys server to confirm orders', [], Redsys::MODULE_DOMAIN)
                    ],
                    'attr' => [
                        // 'readonly' => 'readonly'
                    ]
                ]
            )
            ->add(
                'mode',
                'choice',
                [
                    'constraints' => [ new NotBlank() ],
                    'choices' => [
                        'TEST' => $this->translator->trans('Test', [], Redsys::MODULE_DOMAIN),
                        'PRODUCTION' => $this->translator->trans('Production', [], Redsys::MODULE_DOMAIN),
                    ],
                    'label' => $this->translator->trans('Operation mode', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('mode', 'TEST'),
                    'label_attr' => [
                        'for' => 'mode',
                        'help' => $this->translator->trans('In test mode, only the IPs listed below are allowed to use Redsys payment.', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )

            ->add(
                'allowed_ip_list',
                'textarea',
                [
                    'required' => false,
                    'label' => $this->translator->trans('Allowed IPs in test mode', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('allowed_ip_list', $this->getRequest()->getClientIp()),
                    'label_attr' => [
                        'for' => 'platform_url',
                        'help' => $this->translator->trans(
                            'In test mode, list of IPs addresses allowed to use the Redsys payment on the front-office. Put one IP per line. Your current IP¨is %ip',
                            [ '%ip' => $this->getRequest()->getClientIp() ],
                            Redsys::MODULE_DOMAIN
                        ),
                        'attr' => [
                            'rows' => 3
                        ]
                    ]
                ]
            )
            ->add(
                'minimum_amount',
                'text',
                [
                    'constraints' => [
                        new NotBlank(),
                        new GreaterThanOrEqual(['value' => 0])
                    ],
                    'label' => $this->translator->trans('Minimum order total', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('minimum_amount', '0'),
                    'label_attr' => [
                        'for' => 'minimum_amount',
                        'help' => $this->translator->trans('Minimum order total in the default currency for which this payment method is available. Enter 0 for no minimum', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'maximum_amount',
                'text',
                [
                    'constraints' => [
                        new NotBlank(),
                        new GreaterThanOrEqual(['value' => 0])
                    ],
                    'label' => $this->translator->trans('Maximum order total', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('maximum_amount', '0'),
                    'label_attr' => [
                        'for' => 'maximum_amount',
                        'help' => $this->translator->trans('Maximum order total in the default currency for which this payment method is available. Enter 0 for no maximum', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
            ->add(
                'send_confirmation_email_on_successful_payment',
                'checkbox',
                [
                    'required' => false,
                    'label' => $this->translator->trans('Send the confirmation email only if the order payment is confirmed', [], Redsys::MODULE_DOMAIN),
                    'data' => Redsys::getConfigValue('send_confirmation_email_on_successful_payment', '1') == '1',
                    'label_attr' => [
                        'for' => 'send_confirmation_email_on_successful_payment',
                        'help' => $this->translator->trans('Check this box to send the confirmation email to your customers only if their payment is confirmed by Redsys.', [], Redsys::MODULE_DOMAIN)
                    ]
                ]
            )
        ;
    }

    public function getName()
    {
        return 'redsys_configuration_form';
    }
}
