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

use AFM\Bundle\TranslatableRoutePathBundle\Tests\AppKernel;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

class TranslatablePathRouterTest extends WebTestCase
{
    public function testLoadPathRouteInSpanish()
    {
        $client = static::createClient();

        /** @var Router $router */
        $router = $client->getContainer()->get("router");

        $route = $router->generate("normal_test_route");

        $this->assertEquals("/test/mi-path-de-ejemplo", $route);
    }

    public function testLoadPathRouteInEnglishForce()
    {
        $client = static::createClient();

        /** @var Router $router */
        $router = $client->getContainer()->get("router");
        $route = $router->generate("normal_test_route_force_language");

        $this->assertEquals("/test/my-test-route-path", $route);
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