<?php

namespace CoffeeMug\Module2\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use CoffeeMug\Module2\Helper\RoutesConfig;
use Magento\Framework\App\RouterList;

class RoutesList extends AbstractHelper
{
    protected $routeConfig;
    protected $routerList;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        RoutesConfig $routeConfig,
        RouterList $routerList,
    ) {
        $this->routeConfig = $routeConfig;
        $this->routerList = $routerList;
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
        \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug($logMessage);

        return $routesList;
    }
}
