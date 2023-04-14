<?php

namespace CoffeeMug\Module2\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Logger\Monolog;

class CustomObserver implements ObserverInterface
{
    protected $request;
    protected $logger;

    public function __construct(\Magento\Framework\App\RequestInterface $request, Monolog $logger)
    {
        $this->request = $request;
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $url = $this->request->getPathInfo();
        $this->logger->debug($url);
        // Your code here
        // This method will be executed when the event is triggered
    }
}
