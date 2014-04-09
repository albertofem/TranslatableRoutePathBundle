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

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Validator\Mapping\Loader\LoaderInterface;

class TranslatablePathRouter extends Router
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

    public function getRouteCollection()
    {
        $collection = parent::getRouteCollection();

        return $this->translatablePathRouteLoader->load($collection);
    }
}