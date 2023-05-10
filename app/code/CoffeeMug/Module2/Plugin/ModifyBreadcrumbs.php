<?php

namespace CoffeeMug\Module2\Plugin;

class ModifyBreadcrumbs
{
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
        $crumbInfo['label'] .= "(!)";
        // var_dump($crumbInfo);
        \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug($crumbName);
        return [$crumbName, $crumbInfo];
    }
}
