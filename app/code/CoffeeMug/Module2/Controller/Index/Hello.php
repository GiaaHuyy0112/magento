<?php

namespace CoffeeMug\Module2\Controller\Index;

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
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $result->getConfig()->getTitle()->prepend(__('Hello World'));
        // $result->getConfig()->appendBody('Hello World');

        return $result;
    }
}
