<?php

namespace MerchOne\LaravelApiSdk\Facades;

use Illuminate\Support\Facades\Facade;
use MerchOne\PhpApiSdk\Contracts\Clients\CatalogApi;
use MerchOne\PhpApiSdk\Contracts\Clients\OrdersApi;
use MerchOne\PhpApiSdk\Contracts\Clients\ShippingApi;
use MerchOne\PhpApiSdk\Contracts\Http\HttpClient;
use MerchOne\PhpApiSdk\Http\Client;

/**
 * @mixin Client
 *
 * @method static HttpClient auth(string $user, string $key)
 * @method static HttpClient basicAuth(string $token)
 * @method static HttpClient setHost(string $host)
 * @method static HttpClient setVersion(string $version)
 * @method static string getVersion()
 * @method static CatalogApi catalog()
 * @method static OrdersApi orders()
 * @method static ShippingApi shipping()
 */
class MerchOneApiClient extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return HttpClient::class;
    }
}
