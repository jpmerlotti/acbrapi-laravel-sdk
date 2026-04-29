<?php

return [
    /**
     * The environment to use: sandbox (test) or production.
     */
    'environment' => env('ACBR_API_ENV', 'sandbox'),

    /**
     * Your ACBr API Token.
     */
    'token' => env('ACBR_API_TOKEN', ''),

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
