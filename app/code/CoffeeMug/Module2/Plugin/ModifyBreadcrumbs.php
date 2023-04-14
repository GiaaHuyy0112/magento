<?php

namespace CoffeeMug\Module2\Plugin;

class ModifyBreadcrumbs
{
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
        $crumbName .= "(!)";
        return [$crumbName, $crumbInfo];
    }
}
