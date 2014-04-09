<?php

/*
 * This file is part of TranslatableRoutePathBundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

$autoload = require_once __DIR__ . '/../vendor/autoload.php';

\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespaces(array('Sensio\\Bundle\\FrameworkExtraBundle' => __DIR__ . '/../vendor/sensio/framework-extra-bundle/'));