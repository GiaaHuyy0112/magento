<?php

namespace CoffeeMug\Unit03\Plugin;

use Magento\Framework\View\LayoutInterface;
use Psr\Log\LoggerInterface;

class LayoutLoggedXml
{
    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * LogPageOutput constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }
    public function afterGenerateXml(LayoutInterface $subject, $result)
    {
        $this->_logger->debug("Logger");
        $this->_logger->debug(json_encode($subject->getUpdate()->asSimplexml()));

        return $result;
    }
}
