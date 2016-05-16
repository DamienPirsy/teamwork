# Laravel 5 Teamwork PM API Bridge

[![Build Status](https://travis-ci.org/damienpirsy/teamwork.svg?branch=master)](https://travis-ci.org/DamienPirsy/teamwork)
This is an fork of the great Teamwork API Bridge package by [Rossedman](https://github.com/rossedman/teamwork)

## Installation

Add this to your `composer.json` file and then run `composer update`.

```
"damienpirsy/teamwork": "~1.0"
```

## Laravel Setup

This wrapper comes with support for `Laravel 5`. This includes a service provider as well as a facade for easy access.
Once this package is pulled into your project just add this to your `config/app.php` file.
```php
'providers' => [
    ...
    'Damienpirsy\Teamwork\TeamworkServiceProvider',
],
```

and add the facade to your `aliases` array

```php
'aliases' => [
    ...
    'Teamwork' => 'Damienpirsy\Teamwork\Facades\Teamwork',
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
use Rossedman\Teamwork\Client;
use Rossedman\Teamwork\Factory as Teamwork;

$client     = new Client(new Guzzle, 'YourSecretKey', 'YourTeamworkUrl');
$teamwork   = new Teamwork($client);
```

* * *

## Examples

Not all of the Teamwork API is supported yet but there is still a lot you can do! Below are some examples of how you can access Projects, Companies, and more. To work with a specific Object pass in the ID to perform actions on it. Data can be passed through for creating and editing.

**To see more examples [visit the docs](http://teamwork.rossedman.com)**

```php
// create a project
$teamwork->project()->create([
    "name" => "My New Amazing Project",
    "description" => "This is a project that I will dedicate my whole life too",
    "companyId" => "999"
]);

// get the latest activity on a project
$teamwork->project($projectID)->activity();
```

## Roadmap

#### 1.1 Release

- [X] Add Support For `Comments`
- [ ] Add Support For `Permissions`
- [ ] Add Support For `Time` Endpoint

#### 1.2 Release

- [ ] Add Support For `Categories`
- [ ] Add Support For `People Status`
- [ ] Add Support For `Files`
- [ ] Add Support For `Notebooks`
=======
# teamwork
Teamwork API Wrapper for Laravel 5
>>>>>>> 915e796cce39ab8eff4bdeaed29d41ee4d6b942b
