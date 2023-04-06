<?php

namespace MerchOne\LaravelApiSdk\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use MerchOne\PhpApiSdk\Contracts\Http\HttpClient;
use MerchOne\PhpApiSdk\Http\Client;

class MerchOneApiServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->registerConfig();
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->bootHttpClient();
    }

    /**
     * @return void
     */
    protected function registerConfig(): void
    {
        $configPath = __DIR__ . '/../../config/merch-one-api.php';

        $this->mergeConfigFrom(
            $configPath,
            'merch-one-api'
        );

        $this->publishes([
            $configPath => config_path('merch-one-api.php'),
        ], 'config');
    }

    /**
     * @return void
     */
    protected function bootHttpClient(): void
    {
        $this->app->bind(
            HttpClient::class,
            static function (Application $app) {
                $config = $app->config->get('merch-one-api');

                $clientOptions = [];

                if (Arr::get($config, 'client.use_config')) {
                    $clientOptions = Arr::get($config, 'client.options');
                }

                $client = new Client(
                    Arr::get($config, 'api_version'),
                    $clientOptions
                );

                if ($host = Arr::get($config, 'host')) {
                    $client->setHost($host);
                }

                return $client;
            }
        );
    }
}
