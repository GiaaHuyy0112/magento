<?php

namespace CoffeeMug\Unit03\Block;

use Magento\Framework\View\Element\AbstractBlock;

class CustomBlock extends AbstractBlock
{
    /**
     * Render block HTML.
     *
     * @return string
     */
    protected function _toHtml()
    {
        $html = 'This is a custom block content';

        return $html;
    }
}
