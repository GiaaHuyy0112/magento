<?php

namespace CoffeeMug\Module2\Plugin;

class MyPlugin
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $markup = $result * 100; // Add a 10% markup
        return $result + $markup;
    }
}
