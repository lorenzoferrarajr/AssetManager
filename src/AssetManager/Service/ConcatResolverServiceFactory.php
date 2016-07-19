<?php

namespace AssetManager\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use AssetManager\Resolver\ConcatResolver;

class ConcatResolverServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return ConcatResolver
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $config      = $serviceLocator->get('Config');
        $files = array();

        if (isset($config['asset_manager']['resolver_configs']['concat'])) {
            $files = $config['asset_manager']['resolver_configs']['concat'];
        }

        $concatResolver = new ConcatResolver($files);

        return $concatResolver;
    }
}
