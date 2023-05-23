<?php

namespace CoffeeMug\Unit03\Block;


use Magento\Catalog\Block\Product\View\Description;

class CustomDescription extends Description
{
    /**
     * Render block HTML.
     *
     * @return string
     */
    protected function _beforeToHtml()
    {
        // Set your custom description here
        \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug("Hello");

        $this->getProduct()->setDescription('New!! Test description');
        parent::_beforeToHtml();
    }
}
