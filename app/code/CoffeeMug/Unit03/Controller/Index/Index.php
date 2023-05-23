<?php

namespace CoffeeMug\Unit03\Controller\Index;

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
        $customBlock = $page->getLayout()->createBlock(\CoffeeMug\Unit03\Block\CustomBlock::class);
        $page->getLayout()->setChild('content', $customBlock->getNameInLayout(), $customBlock);

        $text = $page->getLayout()->createBlock(\Magento\Framework\View\Element\Text::class);
        $text->setText('<h1>Hello, This is a text block!</h1>');
        $page->getLayout()->setChild('content', $text->getNameInLayout(), $text);


        $block = $page->getLayout()->createBlock(\CoffeeMug\Unit03\Block\Block::class);
        $block->setTemplate("CoffeeMug_Unit03::block.phtml");
        $page->getLayout()->setChild('content', $block->getNameInLayout(), $block);



        $extra = $page->getLayout()
            ->createBlock('Magento\Cms\Block\Block')
            ->setBlockId('extra-exercise');
        $page->getLayout()->setChild('content', $extra->getNameInLayout(), $extra);


        return $page;
    }
}
