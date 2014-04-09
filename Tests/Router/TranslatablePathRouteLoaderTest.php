<?php

/*
 * This file is part of TranslatableRoutePathBundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\TranslatableRoutePathBundle\Tests\Router;

use AFM\Bundle\TranslatableRoutePathBundle\Router\TranslatablePathRouteLoader;
use AFM\Bundle\TranslatableRoutePathBundle\Tests\AppKernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class TranslatablePathRouteLoaderTest extends WebTestCase
{
    public function testLoadRouteCollectionSpanish()
    {
        $client = static::createClient();

        /** @var Translator $translator */
        $translator = $client->getContainer()->get("translator");
        $translator->setLocale("es");

        $translatableRoutePathLoader = new TranslatablePathRouteLoader($translator);

        $routeCollection = new RouteCollection();
        $route = new Route("/[route.unit.test]/testing-route");
        $route->setOption("translatable", true);

        $routeCollection->add("test_route", $route);

        $collection = $translatableRoutePathLoader->load($routeCollection);

        $resultRoute = $collection->get("test_route");

        $this->assertEquals($resultRoute, $route);
        $this->assertEquals("/path-de-ejemplo/testing-route", $resultRoute->getPath());
    }

    public function testLoadRouteCollectionEnglish()
    {
        $client = static::createClient();

        /** @var Translator $translator */
        $translator = $client->getContainer()->get("translator");
        $translator->setLocale("en");

        $translatableRoutePathLoader = new TranslatablePathRouteLoader($translator);

        $routeCollection = new RouteCollection();
        $route = new Route("/[route.unit.test]/testing-route");
        $route->setOption("translatable", true);

        $routeCollection->add("test_route", $route);

        $collection = $translatableRoutePathLoader->load($routeCollection);

        $resultRoute = $collection->get("test_route");

        $this->assertEquals($resultRoute, $route);
        $this->assertEquals("/example-path/testing-route", $resultRoute->getPath());
    }

    public function testLoadRouteCollectionLocaleInDefaults()
    {
        $client = static::createClient();

        /** @var Translator $translator */
        $translator = $client->getContainer()->get("translator");
        $translator->setLocale("en");

        $translatableRoutePathLoader = new TranslatablePathRouteLoader($translator);

        $routeCollection = new RouteCollection();
        $route = new Route("/[route.unit.test]/testing-route");
        $route->setDefault('_locale', 'es');
        $route->setOption("translatable", true);

        $routeCollection->add("test_route", $route);

        $collection = $translatableRoutePathLoader->load($routeCollection);

        $resultRoute = $collection->get("test_route");

        $this->assertEquals($resultRoute, $route);
        $this->assertEquals("/path-de-ejemplo/testing-route", $resultRoute->getPath());
    }

    protected static function getPhpUnitXmlDir()
    {
        return __DIR__ . '/../../';
    }

    protected static function createKernel(array $options = array())
    {
        return new AppKernel("test", true);
    }
} 