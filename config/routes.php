<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'NifaUsers',
    ['path' => '/nifa-users'],
    function (RouteBuilder $routes) {

        $routes->fallbacks('DashedRoute');

    }
);

