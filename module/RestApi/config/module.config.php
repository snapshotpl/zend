<?php

namespace PhpBenchmarksZend\RestApi;

use PhpBenchmarksZend\RestApi\Controller\RestApiController;
use PhpBenchmarksZend\RestApi\Factory\RestApiControllerFactory;
use PhpBenchmarksZend\RestApi\Factory\RestApiTransformerFactory;
use PhpBenchmarksZend\RestApi\Transformer\RestApiTransformer;
use Zend\Router\Http\Literal;

$routes = require __DIR__ . '/../../../config/routes.php';
$routes['phpbenchmarks'] = [
    'type' => Literal::class,
    'options' => [
        'route' => '/benchmark/rest',
        'defaults' => [
            'controller' => RestApiController::class,
            'action' => 'rest',
        ],
    ],
];

return [
    'controllers' => [
        'factories' => [
            RestApiController::class => RestApiControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => $routes,
    ],
    'view_manager' => [
        'strategies' => ['ViewJsonStrategy']
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'phpArray',
                'base_dir' => __DIR__ .  '/../../../language',
                'pattern' => '%s.php'
            ],
        ],
    ],
    'service_manager' => [
        'aliases' => ['RestApiTransformer' => RestApiTransformer::class],
        'factories' => [RestApiTransformer::class => RestApiTransformerFactory::class]
    ]
];
