<?php

namespace AssetManager\Service;

use AssetManager\Resolver\AliasPathStackResolver;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use AssetManager\Resolver\PathStackResolver;

class AliasPathStackResolverServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return PathStackResolver
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $config  = $serviceLocator->get('config');
        $aliases = array();

        if (isset($config['asset_manager']['resolver_configs']['aliases'])) {
            $aliases = $config['asset_manager']['resolver_configs']['aliases'];
        }

        return new AliasPathStackResolver($aliases);
    }
}
