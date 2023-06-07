<?php

namespace Training\Vendor\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Cms\Model\BlockRepository;


class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_blockRepository;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Cms\Model\BlockRepository $blockRepository

    ) {
        $this->_pageFactory = $pageFactory;
        $this->_blockRepository = $blockRepository;

        return parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->_pageFactory->create();


        $block = $page->getLayout()->createBlock(\Training\Vendor\Block\ProductCollection::class);
        $block->setTemplate("Training_Vendor::product/collection.phtml");
        $page->getLayout()->setChild('content', $block->getNameInLayout(), $block);

        return $page;
    }
}
