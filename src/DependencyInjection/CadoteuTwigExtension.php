<?php

namespace Cadoteu\TwigBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class CadoteuTwigExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        // $loader->load('services.yaml');
        //charge config/packages/test.yaml par lib/Cadotinfo/tools-bundle/DependencyInjection/Configuration.php
        //$config = $this->processConfiguration(new Configuration(), $configs);
    }
}
