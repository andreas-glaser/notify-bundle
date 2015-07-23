<?php

namespace AndreasGlaser\NotifyBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class AndreasGlaserNotifyExtension
 *
 * @package AndreasGlaser\NotifyBundle\DependencyInjection
 *
 * @author  Andreas Glaser
 */
class AndreasGlaserNotifyExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        if (isset($config['enabled']) && $config['enabled']) {
            $loader->load('services.yml');
        }

        $container->setParameter('andreas_glaser_notify', $config);
    }
}
