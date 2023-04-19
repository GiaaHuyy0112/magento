<?php

namespace CoffeeMug\Module2\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Logger\Monolog;

class CapturePageHtml implements ObserverInterface
{
    protected $logger;

    public function __construct(Monolog $logger)
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $html = $observer->getEvent()->getResponse();
        $this->logger->debug("Observer:");
        // $this->logger->debug($html);
    }
}
