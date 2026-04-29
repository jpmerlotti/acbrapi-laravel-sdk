<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ACBr API Credentials
    |--------------------------------------------------------------------------
    |
    | Aqui você deve configurar o seu token de acesso da ACBr API.
    | Você pode obter este token no painel da ACBr API.
    |
    */
    'token' => env('ACBR_API_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | API Environment
    |--------------------------------------------------------------------------
    |
    | Defina se as chamadas serão feitas para o ambiente de produção ou sandbox.
    | Opções: 'production', 'sandbox'
    |
    */
    'environment' => env('ACBR_API_ENV', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | Default Company
    |--------------------------------------------------------------------------
    |
    | Algumas chamadas exigem o CNPJ da empresa que está emitindo o documento.
    |
    */
    'default_cnpj' => env('ACBR_API_CNPJ', ''),

    /*
    |--------------------------------------------------------------------------
    | Timeouts
    |--------------------------------------------------------------------------
    |
    | Tempo limite para as requisições em segundos.
    |
    */
    'timeout' => 30,
];
