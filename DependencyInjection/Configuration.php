<?php

namespace AndreasGlaser\NotifyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package AndreasGlaser\NotifyBundle\DependencyInjection
 *
 * @author  Andreas Glaser
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('andreas_glaser_notify', 'array');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
            ->booleanNode('enabled')->defaultValue(false)->end()
            ->arrayNode('channels')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('sms')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('sender')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('phone_number')->defaultValue(null)->end()
            ->scalarNode('force_overwrite')->defaultValue(false)->end()
            ->end()
            ->end()
            ->scalarNode('catch_all_phone_number')->defaultValue(null)->end()
            ->arrayNode('dispatchers')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('neon_sms')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('user')->defaultValue(null)->end()
            ->scalarNode('clipwd')->defaultValue(null)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->arrayNode('email')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('from_name')->defaultValue('System')->end()
            ->scalarNode('from_email')->defaultValue('no-reply@localhost')->end()
            ->scalarNode('template_content')->defaultValue('AndreasGlaserNotifyBundle:Email:content.html.twig')->end()
            ->scalarNode('template_layout')->defaultValue('AndreasGlaserNotifyBundle:Email:layout.html.twig')->end()
            ->arrayNode('emails')
            ->useAttributeAsKey('id')
            ->prototype('array')
            ->children()
            ->booleanNode('enabled')->defaultValue(true)->end()
            ->scalarNode('subject')->defaultValue(null)->end()
            ->scalarNode('template_content')->defaultValue(null)->end()
            ->scalarNode('template_layout')->defaultValue(null)->end()
            ->scalarNode('from_name')->defaultValue(null)->end()
            ->scalarNode('from_email')->defaultValue(null)->end()
            ->arrayNode('tos')
            ->useAttributeAsKey('id')
            ->prototype('array')
            ->children()
            ->scalarNode('name')->defaultValue(null)->end()
            ->scalarNode('email')->defaultValue(null)->end()
            ->end()
            ->end()
            ->end()
            ->arrayNode('ccs')
            ->useAttributeAsKey('id')
            ->prototype('array')
            ->children()
            ->scalarNode('name')->defaultValue(null)->end()
            ->scalarNode('email')->defaultValue(null)->end()
            ->end()
            ->end()
            ->end()
            ->arrayNode('bccs')
            ->useAttributeAsKey('id')
            ->prototype('array')
            ->children()
            ->scalarNode('name')->defaultValue(null)->end()
            ->scalarNode('email')->defaultValue(null)->end()
            ->end()
            ->end()
            ->end()
            ->arrayNode('attachments')
            ->useAttributeAsKey('id')
            ->prototype('array')
            ->children()
            ->scalarNode('path')->defaultValue(null)->end()
            ->scalarNode('contentType')->defaultValue(null)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}

