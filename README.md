Laravel Elasticsearch Service Provider  (5.0.0)
================================================
[![Latest Stable Version](https://poser.pugx.org/shift31/laravel-elasticsearch/v/stable)](https://packagist.org/packages/shift31/laravel-elasticsearch)
[![Total Downloads](https://poser.pugx.org/shift31/laravel-elasticsearch/downloads)](https://packagist.org/packages/shift31/laravel-elasticsearch)
[![Build Status](https://travis-ci.org/shift31/laravel-elasticsearch.svg?branch=5.0)](https://travis-ci.org/shift31/laravel-elasticsearch)
[![Coverage Status](https://coveralls.io/repos/github/shift31/laravel-elasticsearch/badge.svg?branch=5.0)](https://coveralls.io/github/shift31/laravel-elasticsearch?branch=5.0)
[![License](https://poser.pugx.org/shift31/laravel-elasticsearch/license)](https://packagist.org/packages/shift31/laravel-elasticsearch)

This is a Laravel (5.x) Service Provider for the [official Elasticsearch low-level client](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/0.4/index.html).

Version Matrix
------------------
Since there are breaking changes in Elasticsearch versions, your version of Elasticsearch must match the version of this 
library, which matches the version of the Elasticsearch low-level client. 

|Shift31/laravel-elasticsearch| Elasticsearch | Laravel |
| :---: | :---: | :---: |
| 0.4| <= 0.90.* | 4.2 |
| 1.0, 2.0| \>= 1.0 | 4.x, 5.x |
|4.0| <= 0.90.* | 4.2|
|4.1| \>= 1.0 <= 2.0 | 4.2|
|4.2| \>= 2.0 <= 5.0| 4.2|
|4.5| \>= 5.0| 4.2|
|5.0| <= 0.90.* | 5.x|
|5.1| \>= 1.0 <= 2.0 | 5.x|
|5.2| \>= 2.0 <= 5.0| 5.x|
|5.5| \>= 5.0| 5.x|

Attention: Until we launch new versions please keep using old stable versions (which are created as a branch) and don't use dev-master branch!

Usage
-----
1. Run `composer require shift31/laravel-elasticsearch:~5.0.0`

2. Publish config file

Laravel artisan command 
```
$ php artisan vendor:publish --provider="Shift31\LaravelElasticsearch\ElasticsearchServiceProvider" --tag="config"
```
You can always read config parameters with:
```php
\Config::get('elasticsearch');
```
Note: The keys of this array should be named according the parameters supported by [Elasticsearch\Client](https://github.com/elastic/elasticsearch-php/blob/0.4/src/Elasticsearch/Client.php).

3. In the `'providers'` array in config/app.php, add `'Shift31\LaravelElasticsearch\ElasticsearchServiceProvider'`. 

4. Use the `Es` facade to access any method from the `Elasticsearch\Client` class, for example:
```php
$searchParams['index'] = 'your_index';
$searchParams['size'] = 50;
$searchParams['body']['query']['query_string']['query'] = 'foofield:barstring';
$result = \Es::search($searchParams);
```

Default Configuration
---------------------
If you return an empty array in the config file, Service provider [merges default config with custom config variables](src/ElasticsearchServiceProvider.php).
For custom config file question please see [this](https://www.elastic.co/guide/en/elasticsearch/client/php-api/0.4/_configuration.html#_full_list_of_configurations) elastic search configuration page.

[Default config file](config/elasticsearch.php) which is publishing by artisan command.

Contributing
---------------------
Please see [CONTRIBUTING.md](CONTRIBUTING.md).