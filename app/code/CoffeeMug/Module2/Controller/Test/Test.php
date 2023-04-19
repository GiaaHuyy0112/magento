<?php

namespace CoffeeMug\Module2\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Test extends Action
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
        $result->getConfig()->getTitle()->prepend(__('Test Page'));

        // Add your custom logic here to generate page content

        return $result;
    }
}
