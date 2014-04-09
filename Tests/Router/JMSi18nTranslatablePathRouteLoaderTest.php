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
use Symfony\Component\Translation\Translator;

class JMSi18nTranslatablePathRouteLoaderTest extends WebTestCase
{
    public function testLoadPathRouteInSpanish()
    {
        $client = static::createClient();

        /** @var Router $router */
        $router = $client->getContainer()->get("router");

        $route = $router->generate("test_route_controller");

        $this->assertEquals("/es/ruta-superior/ruta-inferior", $route);
    }

    public function testLoadPathRouteInEnglishForce()
    {
        $client = static::createClient();

        /** @var Router $router */
        $router = $client->getContainer()->get("router");
        $route = $router->generate("test_route_controller_force_language", array('_locale' => 'en'));

        $this->assertEquals("/en/sup-route/sub-route", $route);
    }

    public function testLoadPathRouteNormalInSpanish()
    {
        $client = static::createClient();

        /** @var Router $router */
        $router = $client->getContainer()->get("router");

        $route = $router->generate("normal_test_route");

        $this->assertEquals("/es/test/mi-path-de-ejemplo", $route);
    }

    public function testLoadPathRouteNormalInEnglishForce()
    {
        $client = static::createClient();

        /** @var Router $router */
        $router = $client->getContainer()->get("router");

        $route = $router->generate("normal_test_route", array('_locale' => 'en'));

        $this->assertEquals("/en/test/my-test-route-path", $route);
    }

    protected static function getPhpUnitXmlDir()
    {
        return __DIR__ . '/../../';
    }

    protected static function createKernel(array $options = array())
    {
        return new AppKernel("test_i18n", true);
    }
}