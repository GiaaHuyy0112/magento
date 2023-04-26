<?php

namespace CoffeeMug\Module3\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Hello extends Action
{
    protected $resultFactory;

    public function __construct(Context $context, ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // Render "HELLO WORLD" message
        echo "HELLO WORLD";

        // Redirect to specific category page
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('catalog/category/view/id/1');
        return $resultRedirect;
    }
}
