<?php

namespace PhpBenchmarksZend\RestApi\Factory;

use Interop\Container\ContainerInterface;
use PhpBenchmarksZend\RestApi\Controller\RestApiController;

final class RestApiControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new RestApiController($container->get('MvcTranslator'), $container->get('RestApiTransformer'));
    }
}
