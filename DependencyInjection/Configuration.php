<?php

namespace amillot\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('user');
        $root = $treeBuilder->getRootNode();

        $root
            ->children()
                ->scalarNode('class')
                    ->defaultValue('App\Entity\User')
                ->end()
                ->scalarNode('profile_class')
                    ->defaultValue('App\Entity\Profile')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
