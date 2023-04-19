<?php

namespace CoffeeMug\Module2\Helper;

use Magento\Framework\App\Route\Config;

class RoutesConfig extends Config
{
    public function getRoutes()
    {
        $routes = parent::_getRoutes();
        // Modify the $routes array as needed
        return $routes;
    }
}
