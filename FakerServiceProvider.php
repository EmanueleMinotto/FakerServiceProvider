<?php

namespace EmanueleMinotto\FakerServiceProvider;

use Faker\Factory;
use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Api\BootableProviderInterface;

/**
 * A Faker service provider for Silex 1.
 *
 * @author Emanuele Minotto <minottoemanuele@gmail.com>
 * @author Matheus Marabesi <matheus.marabesi@gmail.com>
 * @link https://silex.symfony.com/doc/2.0/providers.html#creating-a-provider
 */
class FakerServiceProvider implements ServiceProviderInterface, BootableProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $app)
    {
        $app['faker'] = null;
        $app['faker.providers'] = [];
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
        $app['faker'] = function ($app) {
            return Factory::create($app['locale']);
        };

        $providers = array_filter((array) $app['faker.providers'], function ($provider) {
            return class_exists($provider) && is_subclass_of($provider, 'Faker\\Provider\\Base');
        });

        foreach ($providers as $provider) {
            $app['faker']->addProvider(new $provider($app['faker']));
        }
    }
}
