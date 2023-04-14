<?php

namespace CoffeeMug\Module2\Block;

use Magento\Framework\View\Element\Template;

class HelloWorld extends Template
{
    public function getHelloWorld()
    {
        return 'Module 2';
    }
}
