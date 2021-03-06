# Laravel 5 Teamwork PM API Bridge

[![Build Status](https://travis-ci.org/DamienPirsy/teamwork.svg?branch=master)](https://travis-ci.org/DamienPirsy/teamwork)

This is an extended fork of the great Teamwork API Bridge package by [Rossedman](https://github.com/rossedman/teamwork), with additional methods for fetching [Teamwork](http://www.teamwork.com) data.

## Installation

Require the library:

```
$ composer require damienpirsy/teamwork ~1.0
```

## Laravel Setup

This wrapper comes with support for `Laravel 5`. This includes a service provider as well as a facade for easy access.
Once this package is pulled into your project just add this to your `config/app.php` file.
```php
'providers' => [
    ...
    Damienpirsy\Teamwork\TeamworkServiceProvider::class,
],
```

and add the facade to your `aliases` array

```php
'aliases' => [
    ...
    'Teamwork' => Damienpirsy\Teamwork\Facades\Teamwork::class,
],
```

### Configuration

If you are using Laravel then add a `teamwork` array to your `config/services.php` file

```php
...
'teamwork' => [
    'key'  => 'YourSecretKey',
    'url'  => 'YourTeamworkUrl'
],
```

## Configuration Without Laravel

If you are not using Laravel just load this classes and you're ready.

```php
require "vendor/autoload.php";

use GuzzleHttp\Client as Guzzle;
use Damienpirsy\Teamwork\Client;
use Damienpirsy\Teamwork\Factory as Teamwork;

$client     = new Client(new Guzzle, 'YourSecretKey', 'YourTeamworkUrl');
$teamwork   = new Teamwork($client);
```

# Documentation
Please refer to the [project website](http://damienpirsy.github.io/teamwork) for the full package documentation and usage examples.