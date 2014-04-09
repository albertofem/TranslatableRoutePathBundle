<?php

/*
 * This file is part of TranslatableRoutePathBundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\TranslatableRoutePathBundle\Tests;

use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    /**
     * {@inheritDoc}
     */
    public function registerBundles()
    {
        $bundles = array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new SensioFrameworkExtraBundle()
        );

        if($this->environment == 'test_i18n')
            $bundles[] = new \JMS\I18nRoutingBundle\JMSI18nRoutingBundle();

        $bundles[] = new \AFM\Bundle\TranslatableRoutePathBundle\AFMTranslatableRoutePathBundle();
        $bundles[] = new TranslatableRoutePathTestBundle();

        return $bundles;
    }

    /**
     * {@inheritDoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/Resources/config_' .$this->environment. '.yml');
    }
} 