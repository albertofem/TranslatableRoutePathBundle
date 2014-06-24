TranslatableRoutePathBundle
===============

[![build status](https://secure.travis-ci.org/albertofem/TranslatableRoutePathBundle.png)](http://travis-ci.org/albertofem/TranslatableRoutePathBundle) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/albertofem/TranslatableRoutePathBundle/badges/quality-score.png?s=aa0a33f6a748865dba19424e56bf57df90f98e94)](https://scrutinizer-ci.com/g/albertofem/TranslatableRoutePathBundle/)

Allows using translations in routes paths:

```php
/**
 * @Route("/[my.translatable.key]/route/{param}", options={"translatable"=true})
 */
public function myAction()
{
}
```

If `my.transatable.key` is defined in English as: `my_translatable_route`, this will produce a route:

```
/my_translatable_route/route/whatever_param
```


Installation
------------

Require it in composer:

    composer require albertofem/translatableroutepath-bundle dev-master

Install it:

    composer update albertofem/translatableroutepath-bundle

Add it to your bundles:

```php
$bundles = array(
    ...,
    new \AFM\Bundle\TranslatableRoutePathBundle\AFMTranslatableRoutePathBundle()
);
```

Additionally, you can use this bundle with `JMSI18nRoutingBundle` in which case you will need to register it before this one:

```php
$bundles = array(
    ...
    new \JMS\I18nRoutingBundle\JMSI18nRoutingBundle(),
    new \AFM\Bundle\TranslatableRoutePathBundle\AFMTranslatableRoutePathBundle()
);
```

If you need to run the tests:

    ./vendor/bin/phpunit

Usage
-----

You need to add the option to your route to be translatable:

```php
/**
 * @Route("/[my.translatable.key]/route/{param}", options={"translatable"=true})
 */
public function myAction()
{
}
```

Using YAML:

```yaml
my_translatable_route:
    path: /[my.translatable.key]/route/{param}
    options: { translatable: true }
```

Use the syntax `[...]` to referer to translations in your routes paths. You can use this syntax in annotations/yaml/PHP indistintively.

### Integration with **JMSI18nRoutingBundle**

If your are using this great bundle, routes will be automatically translated to all the locales set in the configuration.

### Integration with Symfony core Router

When using Symfony core router, all routes are translated into the default locale. If you need a Route to be translated in another language, you must specify the `_locale` default parameter:

```yaml
my_translatable_route:
    path: /[my.translatable.key]/route/{param}
    options: { translatable: true }
    defaults: { _locale: en } # this route will translated in English
```

TODO
----

* Support parameters for translations (domains, etc.)
* Support transChoice