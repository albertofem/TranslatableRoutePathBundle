<?php

/*
 * This file is part of TranslatableRoutePathBundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\TranslatableRoutePathBundle\Tests\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/[route.annotation.sup]")
 */
class ExampleAnnotationController extends Controller
{
    /**
     * @Route("/[route.annotation.sub]", name="test_route_controller", options={"translatable"=true})
     */
    public function testAction()
    {
    }

    /**
     * @Route("/[route.annotation.sub]", name="test_route_controller_force_language", options={"translatable"=true})
     */
    public function testForceAction()
    {
    }
} 