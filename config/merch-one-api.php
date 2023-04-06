<?php

use MerchOne\PhpApiSdk\Util\MerchOneApi;

return [
    /*
    |--------------------------------------------------------------------------
    | API Version to be used.
    |--------------------------------------------------------------------------
    */
    'api_version' => env('MERCHONE_API_VERSION', MerchOneApi::VERSION_BETA),

    /*
   |--------------------------------------------------------------------------
   | Default configuration for HTTP Client
   | See https://docs.guzzlephp.org/en/stable/request-options.html for more options
   |--------------------------------------------------------------------------
   */
    'client' => [
        // Defines either to use or not default config for options
        'use_config' => true,

        // Guzzle's request options.
        'options' => [
            // The timeout (in seconds) for the request.
            'timeout' => 30,

            // Connection timeout (in seconds) for the request.
            'connect_timeout' => 10,
        ],
    ],
];
