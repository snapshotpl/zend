<?php

namespace PhpBenchmarksZend\RestApi\Factory;

use Interop\Container\ContainerInterface;
use PhpBenchmarksZend\RestApi\Transformer\RestApiTransformer;

final class RestApiTransformerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new RestApiTransformer($container->get('MvcTranslator'));
    }
}
