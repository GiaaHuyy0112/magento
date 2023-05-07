<?php

namespace CoffeeMug\Module2\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use CoffeeMug\Module2\Helper\RoutesList;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    protected $routesList;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        RoutesList $routesList
    ) {
        $this->pageFactory = $pageFactory;
        $this->routesList = $routesList;
        parent::__construct($context);
    }

    public function execute()
    {
        $routes = $this->routesList->getRoutesList();

        foreach ($routes as $route) {
            echo $route . '<br>';
            \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug($route);
        }
        exit;
    }
}
