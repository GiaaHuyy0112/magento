<?php

namespace CoffeeMug\Unit03\Block;

use Magento\Framework\View\Element\Template;

class Block extends Template
{
    /**
     * Render block HTML.
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->getTemplate()) {
            return 'This is a normal content';
        }
        return $this->fetchView($this->getTemplateFile());
    }
}
