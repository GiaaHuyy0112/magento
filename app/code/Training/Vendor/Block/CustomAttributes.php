<?php

namespace Training\Vendor\Block;


use Magento\Catalog\Block\Product\View\Attributes;

class CustomAttributes extends Attributes
{
    /**
     * Render block HTML.
     *
     * @return string
     */
    protected function _beforeToHtml()
    {
        // Set your custom description here
        parent::_beforeToHtml();
    }
}
