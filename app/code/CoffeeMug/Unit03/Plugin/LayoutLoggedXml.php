<?php

namespace CoffeeMug\Unit03\Plugin;

use Magento\Framework\View\LayoutInterface;
use Psr\Log\LoggerInterface;
use \Magento\Framework\App\Request\Http;

class LayoutLoggedXml
{
    /**
     * @var LoggerInterface
     */
    protected $_logger;

    protected $_request;

    /**
     * LogPageOutput constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger, Http $request)
    {
        $this->_logger = $logger;
        $this->_request = $request;
    }
    public function afterGenerateXml(LayoutInterface $subject, $result)
    {


        if ($this->_request->getFullActionName() == 'catalog_product_view') {
            $this->_logger->debug(json_encode($subject->getUpdate()->asSimplexml()));
        }

        return $result;
    }
}
