<?php

namespace CoffeeMug\Module2\App\Router;

use Magento\Framework\App\Action\Redirect;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Router\Base;

class Router extends Base
{
    protected $actionFactory;

    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request)
    {
        $pathInfo = $request->getPathInfo();
        \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug("URL:");
        \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug($pathInfo);
        if ($pathInfo == '/special-url') {
            $redirect = $this->actionFactory->create(Redirect::class);
            $redirect->setPath('special-page');
            return $redirect;
        }
        return false;
    }
}
