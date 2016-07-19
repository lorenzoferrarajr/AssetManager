<?php

namespace AssetManager\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Factory for the Asset Cache Manager Service
 *
 * @package AssetManager\Service
 */
class AssetCacheManagerServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return AssetFilterManager
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $config = array();

        $globalConfig = $serviceLocator->get('config');

        if (!empty($globalConfig['asset_manager']['caching'])) {
            $config = $globalConfig['asset_manager']['caching'];
        }

        return new AssetCacheManager($serviceLocator, $config);
    }
}
