<?php

namespace EmanueleMinotto\FakerServiceProvider\Tests;

use EmanueleMinotto\FakerServiceProvider\FakerServiceProvider;
use PHPUnit_Framework_TestCase;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Emanuele Minotto <minottoemanuele@gmail.com>
 *
 * @coversDefaultClass \EmanueleMinotto\FakerServiceProvider\FakerServiceProvider
 */
class FakerServiceProviderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::register
     */
    public function testRegisterServiceProvider()
    {
        $app = new Application();
        $app->register(new FakerServiceProvider());

        $this->assertInstanceOf('Faker\\Generator', $app['faker']);
    }

    /**
     * Simulates a request and controls the output.
     *
     * @coversNothing
     */
    public function testRequest()
    {
        $app = new Application();
        $app->register(new FakerServiceProvider());

        $app->get('/', function () use ($app) {
            return $app['faker']->randomDigit;
        });

        $request = Request::create('/');
        $response = $app->handle($request);

        $this->assertTrue($response->isOk());
        $this->assertRegExp('/\d+/', $response->getContent());
    }
}
