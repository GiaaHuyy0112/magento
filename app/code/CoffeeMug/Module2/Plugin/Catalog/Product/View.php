<?php

namespace CoffeeMug\Module2\Plugin\Catalog\Product;

class View
{
    public function beforeExecute(\Magento\Catalog\Controller\Product\View $subject)
    {
        // modify request parameters
    }

    public function aroundExecute(\Magento\Catalog\Controller\Product\View $subject, callable $proceed)
    {
        // modify the behavior of the original method
        return $proceed();
    }

    public function afterExecute(\Magento\Catalog\Controller\Product\View $subject, $result)
    {
        // modify the result of the original method
        return $result;
    }
}
