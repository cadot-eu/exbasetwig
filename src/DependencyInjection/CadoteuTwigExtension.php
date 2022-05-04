<?php

namespace Cadoteu\TwigBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class CadoteuTwigExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $containerBuilder = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        //charge config/packages/test.yaml par lib/Cadotinfo/tools-bundle/DependencyInjection/Configuration.php
        //$config = $this->processConfiguration(new Configuration(), $configs);

    }
}
