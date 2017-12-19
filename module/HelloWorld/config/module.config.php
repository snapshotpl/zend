<?php

namespace PhpBenchmarksZend\HelloWorld;

use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\HelloWorldController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'phpbenchmarks' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/benchmark/helloworld',
                    'defaults' => [
                        'controller' => Controller\HelloWorldController::class,
                        'action' => 'helloWorld',
                    ],
                ],
            ],
        ],
    ]
];
