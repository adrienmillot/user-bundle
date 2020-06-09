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
            ->end()
        ;

        return $treeBuilder;
    }
}
