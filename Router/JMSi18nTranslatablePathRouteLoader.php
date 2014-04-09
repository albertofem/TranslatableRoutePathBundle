<?php

/*
 * This file is part of TranslatableRoutePathBundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\TranslatableRoutePathBundle\Router;

use JMS\I18nRoutingBundle\Router\I18nLoader;
use JMS\I18nRoutingBundle\Router\PathGenerationStrategyInterface;
use JMS\I18nRoutingBundle\Router\RouteExclusionStrategyInterface;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Translation\TranslatorInterface;

class JMSi18nTranslatablePathRouteLoader extends I18nLoader
{
    /**
     * @var TranslatablePathRouteLoader
     */
    protected $translatablePathRouteLoader;

    /**
     * @param \AFM\Bundle\TranslatableRoutePathBundle\Router\TranslatablePathRouteLoader $translatablePathRouteLoader
     */
    public function setTranslatablePathRouteLoader($translatablePathRouteLoader)
    {
        $this->translatablePathRouteLoader = $translatablePathRouteLoader;
    }

    public function load(RouteCollection $collection)
    {
        $collection = parent::load($collection);

        return $this->translatablePathRouteLoader->load($collection);
    }
} 