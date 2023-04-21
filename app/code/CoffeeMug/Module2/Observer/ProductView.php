<?php

namespace CoffeeMug\Module2\Observer;

use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;
use Psr\Log\LoggerInterface;

class ProductView implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * @var UrlInterface
     */
    protected $_urlInterFace;

    /**
     * @var ActionFlag
     */
    protected $_actionFlag;

    /**
     * @param ActionFlag $_actionFlag
     * @param UrlInterface $_urlInterFace
     * @param LoggerInterface $_logger
     */
    public function __construct(
        ActionFlag $_actionFlag,
        UrlInterface $_urlInterFace,
        LoggerInterface $_logger
    ) {
        $this->_actionFlag = $_actionFlag;
        $this->_urlInterFace = $_urlInterFace;
        $this->_logger = $_logger;
    }

    public function execute(Observer $observer)
    {
        echo ("Hello");
    }
}