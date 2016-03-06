<?php
/*************************************************************************************/
/*                                                                                   */
/*      This file is not free software                                               */
/*                                                                                   */
/*      Copyright (c) Franck Allimant, CQFDev                                        */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*************************************************************************************/

/**
 * Created by Franck Allimant, CQFDev <franck@cqfdev.fr>
 * Date: 05/03/2016 18:11
 */

namespace Redsys\Hook;

use Redsys\Redsys;
use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use Thelia\Model\ModuleConfig;
use Thelia\Model\ModuleConfigQuery;

class HookManager extends BaseHook
{
    const MAX_TRACE_SIZE_IN_BYTES = 40000;

    public function onModuleConfigure(HookRenderEvent $event)
    {
        $logFilePath = sprintf(THELIA_ROOT."log".DS."%s.log", strtolower(Redsys::MODULE_DOMAIN));

        $traces = @file_get_contents($logFilePath);

        if (false === $traces) {
            $traces = $this->translator->trans("The log file does not exists yet.", [], Redsys::MODULE_DOMAIN);
        } elseif (empty($traces)) {
            $traces = $this->translator->trans("The log file is empty.", [], Redsys::MODULE_DOMAIN);
        } else {
            // Limiter la taille des traces
            if (strlen($traces) > self::MAX_TRACE_SIZE_IN_BYTES) {
                $traces = substr($traces, strlen($traces) - self::MAX_TRACE_SIZE_IN_BYTES);
                // Cut a first line break;
                if (false !== $lineBreakPos = strpos($traces, "\n")) {
                    $traces = substr($traces, $lineBreakPos + 1);
                }

                $traces = $this->translator->trans(
                        "(Previous log is in %file file.)\n",
                        ['%file' => sprintf("log" . DS . "%s.log", Redsys::MODULE_DOMAIN)],
                        Redsys::MODULE_DOMAIN
                    ) . $traces;
            }
        }

        $vars = ['trace_content' => nl2br($traces)  ];

        if (null !== $params = ModuleConfigQuery::create()->findByModuleId(Redsys::getModuleId())) {
            /** @var ModuleConfig $param */
            foreach ($params as $param) {
                $vars[ $param->getName() ] = $param->getValue();
            }
        }


        $event->add(
            $this->render('redsys/module-configuration.html', $vars)
        );
    }
}