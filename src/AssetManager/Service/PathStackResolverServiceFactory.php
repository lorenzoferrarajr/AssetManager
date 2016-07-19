<?php

namespace AssetManager\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use AssetManager\Resolver\PathStackResolver;

class PathStackResolverServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return PathStackResolver
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $config            = $serviceLocator->get('config');
        $pathStackResolver = new PathStackResolver();
        $paths             = array();

        if (isset($config['asset_manager']['resolver_configs']['paths'])) {
            $paths = $config['asset_manager']['resolver_configs']['paths'];
        }

        $pathStackResolver->addPaths($paths);

        return $pathStackResolver;
    }
}
