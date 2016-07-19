<?php

namespace AssetManagerTest\Service;

use PHPUnit_Framework_TestCase;
use AssetManager\Service\AssetFilterManagerServiceFactory;
use AssetManager\Service\AssetFilterManager;
use AssetManager\Service\MimeResolver;
use Zend\ServiceManager\ServiceManager;

class AssetFilterManagerServiceFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService(
            'config',
            array(
                'asset_manager' => array(
                    'filters' => array(
                        'css' => array(
                            'filter' => 'Lessphp',
                        ),
                    ),
                ),
            )
        );

        $serviceManager->setService('AssetManager\Service\MimeResolver', new MimeResolver);

        $t = new AssetFilterManagerServiceFactory($serviceManager);

        $service = $t->__invoke($serviceManager, 'dummy');

        $this->assertTrue($service instanceof AssetFilterManager);
    }
}
