<?php

/*
 * This file is part of TranslatableRoutePathBundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\TranslatableRoutePathBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SetServicesAliasesPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if($container->hasDefinition("jms_i18n_routing.loader"))
        {

            $container->setAlias("jms_i18n_routing.loader", "afm_route_path_translatable.jms_i18n_loader");
        }
        else
        {
            $container->setAlias("router", "afm_route_path_translatable.router");
        }

        $translatorDef = $container->findDefinition('translator');

        if ('%translator.identity.class%' === $translatorDef->getClass())
        {
            throw new \RuntimeException('The AFMRoutePathTranslatable requires Symfony2\'s translator to be enabled.');
        }
    }
} 