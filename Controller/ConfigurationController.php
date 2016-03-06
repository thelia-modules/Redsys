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

use Redsys\Redsys;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\HttpFoundation\Response;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Tools\URL;

/**
 * Redsys payment module
 *
 * @author Franck Allimant <franck@cqfdev.fr>
 */
class ConfigurationController extends BaseAdminController
{
    public function downloadLog()
    {
        if (null !== $response = $this->checkAuth(AdminResources::MODULE, 'Redsys', AccessManager::UPDATE)) {
            return $response;
        }

        $logFilePath = sprintf(THELIA_ROOT."log".DS."%s.log", strtolower(Redsys::MODULE_DOMAIN));

        return Response::create(
            @file_get_contents($logFilePath),
            200,
            array(
                'Content-type' => "text/plain",
                'Content-Disposition' => sprintf('Attachment;filename=redsys-log.txt')
            )
        );
    }

    public function configure()
    {
        if (null !== $response = $this->checkAuth(AdminResources::MODULE, 'Redsys', AccessManager::UPDATE)) {
            return $response;
        }

        $configurationForm = $this->createForm('redsys.form.configure');

        try {
            $form = $this->validateForm($configurationForm, "POST");

            // Get the form field values
            $data = $form->getData();

            foreach ($data as $name => $value) {
                if (is_array($value)) {
                    $value = implode(';', $value);
                }

                Redsys::setConfigValue($name, $value);
            }

            $this->adminLogAppend(
                "redsys.configuration.message",
                AccessManager::UPDATE,
                sprintf("Redsys configuration updated")
            );

            if ($this->getRequest()->get('save_mode') == 'stay') {
                // If we have to stay on the same page, redisplay the configuration page/
                $url = '/admin/module/Redsys';
            } else {
                // If we have to close the page, go back to the module back-office page.
                $url = '/admin/modules';
            }

            return $this->generateRedirect(URL::getInstance()->absoluteUrl($url));
        } catch (FormValidationException $ex) {
            $error_msg = $this->createStandardFormValidationErrorMessage($ex);
        } catch (\Exception $ex) {
            $error_msg = $ex->getMessage();
        }

        $this->setupFormErrorContext(
            $this->getTranslator()->trans("Redsys configuration", [], Redsys::MODULE_DOMAIN),
            $error_msg,
            $configurationForm,
            $ex
        );

        return $this->generateRedirect(URL::getInstance()->absoluteUrl('/admin/module/Redsys'));
    }
}
