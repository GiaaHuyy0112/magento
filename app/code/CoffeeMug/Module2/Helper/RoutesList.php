<?php

namespace CoffeeMug\Module2\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use CoffeeMug\Module2\Helper\RoutesConfig;
use Magento\Framework\App\RouterList;
use Magento\Framework\Logger\Monolog;

class RoutesList extends AbstractHelper
{
    protected $routeConfig;
    protected $routerList;
    protected $logger;


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        RoutesConfig $routeConfig,
        RouterList $routerList,
        Monolog $logger
    ) {
        $this->routeConfig = $routeConfig;
        $this->routerList = $routerList;
        $this->logger = $logger;

        parent::__construct($context);
    }


    public function getRoutesList()
    {
        $routes = $this->routeConfig->getRoutes('frontend');
        $routesList = [];

        foreach ($routes as $routeId => $route) {
            $routerList = $this->routerList->current($routeId);
            if ($routerList) {
                $routesList[] = $routeId;
            }
        }
        $logMessage = 'List of all routes: ' . implode(', ', $routesList);
        $this->logger->debug($logMessage);
        // \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug($logMessage);

        return $routesList;
    }
}
