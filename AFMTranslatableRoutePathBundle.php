<?php

/*
 * This file is part of TranslatableRoutePathBundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\TranslatableRoutePathBundle;

use AFM\Bundle\TranslatableRoutePathBundle\DependencyInjection\AFMTranslatableRoutePathExtension;
use AFM\Bundle\TranslatableRoutePathBundle\DependencyInjection\Compiler\SetServicesAliasesPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AFMTranslatableRoutePathBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new SetServicesAliasesPass());
    }

    public function getContainerExtension()
    {
        return new AFMTranslatableRoutePathExtension();
    }
}