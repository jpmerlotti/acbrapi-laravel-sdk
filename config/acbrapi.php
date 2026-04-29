<?php

return [
    /**
     * The environment to use: sandbox (test) or production.
     */
    'environment' => env('ACBR_API_ENV', 'sandbox'),

    /**
     * ACBr API Authentication.
     */
    'client_id' => env('ACBR_API_CLIENT_ID', ''),
    'client_secret' => env('ACBR_API_CLIENT_SECRET', ''),

    /**
     * Default timeout for requests in seconds.
     */
    'timeout' => env('ACBR_API_TIMEOUT', 30),

    /**
     * API Endpoints.
     */
    'endpoints' => [
        'sandbox' => 'https://sandbox.acbr.api.br/',
        'production' => 'https://api.acbr.api.br/',
    ],
];
