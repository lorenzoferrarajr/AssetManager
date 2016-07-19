<?php

namespace AssetManager\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AssetFilterManagerServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return AssetFilterManager
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $filters = array();
        $config  = $serviceLocator->get('Config');

        if (!empty($config['asset_manager']['filters'])) {
            $filters = $config['asset_manager']['filters'];
        }

        $assetFilterManager = new AssetFilterManager($filters);

        $assetFilterManager->setServiceLocator($serviceLocator);
        $assetFilterManager->setMimeResolver($serviceLocator->get('AssetManager\Service\MimeResolver'));

        return $assetFilterManager;
    }
}
