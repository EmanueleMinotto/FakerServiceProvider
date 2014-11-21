<?php

namespace EmanueleMinotto;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Faker\Factory;

/**
 * A Faker service provider for Silex
 *
 * @author Emanuele Minotto <minottoemanuele@gmail.com>
 * @link http://silex.sensiolabs.org/doc/providers.html#creating-a-provider Creating a provider
 */
class FakerServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['faker'] = Factory::create($app['locale']);
    }

    public function boot(Application $app)
    {
        
    }
}
