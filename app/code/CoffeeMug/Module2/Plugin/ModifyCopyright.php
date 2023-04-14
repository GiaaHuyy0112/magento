<?php

namespace CoffeeMug\Module2\Plugin;

class ModifyCopyright
{
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        $result = ' Customized copyright! ';
        return $result;
    }
}
