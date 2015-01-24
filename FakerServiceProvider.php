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
        $app['faker'] = Factory::create($app['locale']);
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }
}
