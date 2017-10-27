<?php

namespace PhpBenchmarksZend\HelloWorld;

use Zend\Router\Http\Segment;
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
                'type' => Segment::class,
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
