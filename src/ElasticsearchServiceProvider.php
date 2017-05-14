<?php

namespace Shift31\LaravelElasticsearch;

use Elasticsearch\Client;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ElasticsearchServiceProvider extends ServiceProvider
{
    const VERSION = '5.0.0';
    const CONFIG_PATH = __DIR__ . '/../config/elasticsearch.php';

    /**
     * @inheritdoc
     */
    public function boot()
    {
        $this->publishes([self::CONFIG_PATH => config_path('elasticsearch.php')], 'config');
    }

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'elasticsearch');
        $this->app->singleton('elasticsearch', function () {
            $config = Config::get('elasticsearch');

            return new Client($config);
        });

        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('Es', 'Shift31\LaravelElasticsearch\Facades\Es');
        });
    }

    /**
     * @inheritdoc
     */
    public function provides()
    {
        return ['elasticsearch'];
    }
}
