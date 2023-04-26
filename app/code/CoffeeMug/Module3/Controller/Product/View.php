<?php

namespace CoffeeMug\Module2\Controller\Product;

use Magento\Catalog\Controller\Product\View as MagentoView;
use Magento\Framework\App\Action\Context;

class View extends MagentoView
{
    public function execute()
    {
        // Your custom code goes here
        $productId = $this->getRequest()->getParam('id');
        // Load the product model
        $product = $this->_initProduct();
        // Set some custom data on the product
        $product->setCustomData('some value');
        // Render the product view page
        return parent::execute();
    }
}
