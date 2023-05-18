<?php

namespace CoffeeMug\Module3\Controller\Adminhtml\Custom;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('CoffeeMug_Module3::item');
        $resultPage->getConfig()->getTitle()->prepend(__('Hello Page'));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        $secret = $this->getRequest()->getParam('secret');

        if (!$secret) {
            $this->_forward('noroute');
            return;
        }

        return true;
    }
}
