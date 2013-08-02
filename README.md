FakerServiceProvider
====================

A [Faker](https://github.com/fzaninotto/Faker) service provider for [Silex](http://silex.sensiolabs.org/).

## Install
Install Silex using [Composer](http://getcomposer.org/).

Install the FakerServiceProvider adding `emanueleminotto/faker-service-provider` to your composer.json or from CLI:

```
$ php composer.phar require emanueleminotto/faker-service-provider:dev-master
```

## Usage
Initialize it using `register`, it allows only the `locale` option
```php
<?php

use EmanueleMinotto\FakerServiceProvider;

$app -> register(new FakerServiceProvider, array(
    'locale' => 'it_IT' // default: en_US
));
```

From PHP
```php
<?php

$app -> get('/hello', function () use ($app) {
    return 'Hello ' . $app['faker'] -> name;
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