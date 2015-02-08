Faker Service Provider
======================

[![Build Status](https://img.shields.io/travis/EmanueleMinotto/FakerServiceProvider.svg?style=flat)](https://travis-ci.org/EmanueleMinotto/FakerServiceProvider)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/557f1b04-745e-49f9-b64e-8ad962f49eda.svg?style=flat)](https://insight.sensiolabs.com/projects/557f1b04-745e-49f9-b64e-8ad962f49eda)
[![Coverage Status](https://img.shields.io/coveralls/EmanueleMinotto/FakerServiceProvider.svg?style=flat)](https://coveralls.io/r/EmanueleMinotto/FakerServiceProvider)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/EmanueleMinotto/FakerServiceProvider.svg?style=flat)](https://scrutinizer-ci.com/g/EmanueleMinotto/FakerServiceProvider/)
[![Total Downloads](https://img.shields.io/packagist/dt/emanueleminotto/faker-service-provider.svg?style=flat)](https://packagist.org/packages/emanueleminotto/faker-service-provider)

A [Faker](https://github.com/fzaninotto/Faker) service provider for [Silex](http://silex.sensiolabs.org/).

API: [emanueleminotto.github.io/FakerServiceProvider](http://emanueleminotto.github.io/FakerServiceProvider/)

## Install
Install Silex using [Composer](http://getcomposer.org/).

Install the FakerServiceProvider adding `emanueleminotto/faker-service-provider` to your composer.json or from CLI:

```
$ composer require emanueleminotto/faker-service-provider
```

## Usage
Initialize it using `register`
```php
use EmanueleMinotto\FakerServiceProvider\FakerServiceProvider;

$app->register(new FakerServiceProvider(), array(
    'faker.providers' => array(
        'CompanyNameGenerator\\FakerProvider',
        'EmanueleMinotto\\Faker\\PlaceholdItProvider',
    ), // default empty
    'locale' => 'it_IT', // default: en_US
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
