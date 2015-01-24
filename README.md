Faker Service Provider [![Build Status](https://travis-ci.org/EmanueleMinotto/FakerServiceProvider.svg)](https://travis-ci.org/EmanueleMinotto/FakerServiceProvider)
====================

A [Faker](https://github.com/fzaninotto/Faker) service provider for [Silex](http://silex.sensiolabs.org/).

## Install
Install Silex using [Composer](http://getcomposer.org/).

Install the FakerServiceProvider adding `emanueleminotto/faker-service-provider` to your composer.json or from CLI:

```
$ composer require emanueleminotto/faker-service-provider
```

## Usage
Initialize it using `register`, it allows only the `locale` option
```php
use EmanueleMinotto\FakerServiceProvider\FakerServiceProvider;

$app->register(new FakerServiceProvider(), array(
    'locale' => 'it_IT' // default: en_US
));
```

From PHP
```php
$app->get('/hello', function () use ($app) {
    return 'Hello ' . $app['faker']->name;
});
```

From [Twig](http://twig.sensiolabs.org/)
```html
<!DOCTYPE html>
<html>
    <body>
        <p>Hello {{ app.faker.name }}!</p>
    </body>
</html>
```
