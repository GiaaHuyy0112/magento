<?php

namespace CoffeeMug\Module2\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;

class Router extends \Magento\Framework\App\Router\Base implements RouterInterface
{
    protected $actionFactory;

    /**
     * @var UrlInterface
     */
    protected $url;

    public function __construct(ActionFactory $actionFactory, UrlInterface $url)
    {
        $this->actionFactory = $actionFactory;
        $this->url = $url;
    }

    public function match(RequestInterface $request)
    {
        \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug(json_encode($request->getModuleName()));
        $url = trim($request->getPathInfo(), '/');
        $urlParts = explode('-', $url);
        // \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug("URL:");
        // \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug($url);

        if (count($urlParts) === 4 && $urlParts[0] === 'test') {
            $request->setModuleName($urlParts[1])
                ->setControllerName($urlParts[2])
                ->setActionName($urlParts[3]);

            return null;

            // \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class)->debug(json_encode($request));
        }

        return parent::match($request);
    }
}
