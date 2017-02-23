<?php

namespace AndreasGlaser\NotifyBundle\Tests;

use AndreasGlaser\NotifyBundle\DependencyInjection\AndreasGlaserDCEventExtension;
use AndreasGlaser\NotifyBundle\DependencyInjection\AndreasGlaserNotifyExtension;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\DependencyInjection\Compiler\ResolveDefinitionTemplatesPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

/**
 * Class TestCase
 *
 * @package AndreasGlaser\NotifyBundle\Tests
 * @author  Andreas Glaser
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public function createYamlBundleTestContainer()
    {
        $container = new ContainerBuilder(new ParameterBag([
            'kernel.debug'       => false,
            'kernel.bundles'     => ['YamlBundle' => 'Fixtures\Bundles\YamlBundle\YamlBundle'],
            'kernel.cache_dir'   => sys_get_temp_dir(),
            'kernel.environment' => 'test',
            'kernel.root_dir'    => __DIR__ . '/../../../../', // src dir
        ]));

        $container->set('annotation_reader', new AnnotationReader());
        $extension = new AndreasGlaserNotifyExtension();
        $container->registerExtension($extension);
        $extension->load([
            [
                'enabled' => true,
            ],
        ], $container);

        $container->getCompilerPassConfig()->setOptimizationPasses([new ResolveDefinitionTemplatesPass()]);
        $container->getCompilerPassConfig()->setRemovingPasses([]);
        $container->compile();

        return $container;
    }
}