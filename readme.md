<h2 align="center">
    MerchOne API SDK for Laravel
</h2>

<p align="center">
    <a href="https://packagist.org/packages/merch-one/laravel-api-sdk"><img src="https://img.shields.io/packagist/v/merch-one/laravel-api-sdk?color=orange&style=flat-square" alt="Packagist Version"></a>
    <a href="https://packagist.org/packages/merch-one/laravel-api-sdk"><img src="https://img.shields.io/packagist/l/merch-one/laravel-api-sdk?color=brightgreen&style=flat-square" alt="License"></a>
    <a href="https://packagist.org/packages/merch-one/laravel-api-sdk"><img src="https://img.shields.io/packagist/dependency-v/merch-one/laravel-api-sdk/php?style=flat-square" alt="Minimum PHP version"></a>
    <a href="https://packagist.org/packages/merch-one/laravel-api-sdk"><img src="https://img.shields.io/github/last-commit/merch-one/laravel-api-sdk?color=blue&style=flat-square" alt="GitHub last commit"></a>
</p>

This package provide a Laravel extension that allow developers to easily integrate with MerchOne API.

## Installation
```shell
composer require merch-one/laravel-api-sdk
```

- If you need config in your config root path, run `php artisan vendor:publish` to publish config.

```shell
php artisan vendor:publish --provider="MerchOne\LaravelApiSdk\Providers\MerchOneApiServiceProvider" --tag="config"
```

## Overview

- [Introduction](#introduction)
- [Basic Usage](#basic-usage)
- [Configuration](#configuration)

---

### Introduction

**This package extends merch-one/php-api-sdk.**

**For all package tools & possibilities, please check 
[PHP SDK Documentation](https://github.com/merch-one/php-api-sdk#basic-usage)**

**To get the list of available endpoints, please check 
[MerchOne API Documentation](https://docs.merchone.com/api-reference)**

--- 

### Basic Usage

**Package provides several ways to interact with.**

- You can use `MerchOneApiClient` facade.

```php
use MerchOne\LaravelApiSdk\Facades\MerchOneApiClient;

class MyService
 { 
    public function doSomething(): void
     {
        $client = MerchOneApiClient::auth()->...;
    }
}
```

- You can use Laravel's dependency injection.

```php
use MerchOne\PhpApiSdk\Contracts\Http\HttpClient;

class MyService
 { 
    public function doSomething(HttpClient $client): void
     {
        $client = $client->auth()->...;
    }
}
```

- You can ask Laravel's [Service Container](https://laravel.com/docs/container) to resolve the `MerchOne\PhpApiSdk\Contracts\Http\HttpClient` interface.

```php
use MerchOne\PhpApiSdk\Contracts\Http\HttpClient;

class MyService
 { 
    public function doSomething(): void
     {
        $client = app(HttpClient::class)->auth()->...;
    }
}
```

Once the client is instantiated, you can use all the methods described in the 
[PHP SDK Documentation](https://github.com/merch-one/php-api-sdk#basic-usage)

--- 

### Configuration
**Once the `merch-one-api` config is published, you can configure the API version and Guzzle request options.**


To see all available options, please check [Guzzle Documentation](https://docs.guzzlephp.org/en/stable/request-options.html)
- The `User-Agent`, `Accept` and `Content-Type` headers, as well as `http_error` properties **CAN NOT** be overwritten !
