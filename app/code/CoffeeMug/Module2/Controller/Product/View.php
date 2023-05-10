<?php

namespace CoffeeMug\Module2\Controller\Product;

use Magento\Catalog\Controller\Product\View as MagentoView;
use Magento\Framework\App\Action\Context;

class View extends MagentoView
{
    public function execute()
    {
        // $productId = $this->getRequest()->getParam('id');
        // $product = $this->_initProduct();
        // $product->setCustomData('some value');
        return parent::execute();
    }
}
