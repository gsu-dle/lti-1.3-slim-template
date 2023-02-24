<?php

declare(strict_types=1);

namespace GAState\MyLTIApp;

use GAState\Web\LTI\Slim\App                     as LTIApp;
use Psr\Http\Server\MiddlewareInterface          as Middleware;
use Slim\Interfaces\RouteCollectorProxyInterface as RouteContainer;

class App extends LTIApp
{
    /**
     * @param array<string,Middleware|null> $middleware
     *
     * @return void
     */
    protected function loadMiddleware(array $middleware): void
    {
        parent::loadMiddleware($middleware);
    }


    /**
     * @param RouteContainer $routes
     *
     * @return void
     */
    protected function loadRoutes(RouteContainer $routes): void
    {
        parent::loadRoutes($routes);
    }
}
