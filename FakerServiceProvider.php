<?php

namespace EmanueleMinotto\FakerServiceProvider;

use Faker\Factory;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * A Faker service provider for Silex 1.
 *
 * @author Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * @link http://silex.sensiolabs.org/doc/providers.html#creating-a-provider
 */
class FakerServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        $app['faker'] = null;
        $app['faker.providers'] = array();
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
        // generator instance
        $app['faker'] = $app->share(function ($app) {
            return Factory::create($app['locale']);
        });

        // third-party providers
        $providers = array_filter((array) $app['faker.providers'], function ($provider) {
            return class_exists($provider) && is_subclass_of($provider, 'Faker\\Provider\\Base');
        });

        foreach ($providers as $provider) {
            $app['faker']->addProvider(new $provider($app['faker']));
        }
    }
}
