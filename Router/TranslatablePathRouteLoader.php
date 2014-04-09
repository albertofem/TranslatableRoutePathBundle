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

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Translation\TranslatorInterface;

class TranslatablePathRouteLoader
{
    /**
     * @var TranslatorInterface
     */
    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function load(RouteCollection $collection)
    {
        foreach ($collection->all() as $route)
        {
            if(!$route->getOption("translatable"))
                continue;

            $host = $this;
            $route->setPath(preg_replace_callback("/\[(.*?)\]/i", function($matches) use ($route, $host)
            {
                return $host->translator->trans($matches[1], array(), null, $route->getDefault("_locale") ?: null);
            }, $route->getPath()));
        }

        return $collection;
    }
} 