<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ACBr API Credentials
    |--------------------------------------------------------------------------
    |
    | Here you should configure your ACBr API access token.
    | You can obtain this token in the ACBr API dashboard.
    |
    */
    'token' => env('ACBR_API_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | API Environment
    |--------------------------------------------------------------------------
    |
    | Define whether the calls will be made to the production or sandbox environment.
    | Options: 'production', 'sandbox'
    |
    */
    'environment' => env('ACBR_API_ENV', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | Default Company
    |--------------------------------------------------------------------------
    |
    | Some calls require the CNPJ of the company issuing the document.
    |
    */
    'default_cnpj' => env('ACBR_API_CNPJ', ''),

    /*
    |--------------------------------------------------------------------------
    | Timeouts
    |--------------------------------------------------------------------------
    |
    | Request timeout in seconds.
    |
    */
    'timeout' => 30,
];
