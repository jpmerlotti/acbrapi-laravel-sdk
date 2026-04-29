<?php

use ACBr\Laravel\Facades\ACBr;
use ACBrAPI\Api\CepApi;
use ACBrAPI\Api\CnpjApi;
use ACBrAPI\Api\ContaApi;
use ACBrAPI\Api\CteApi;
use ACBrAPI\Api\CteOsApi;
use ACBrAPI\Api\DceApi;
use ACBrAPI\Api\DebugApi;
use ACBrAPI\Api\DistribuioNFEApi;
use ACBrAPI\Api\EmailApi;
use ACBrAPI\Api\EmpresaApi;
use ACBrAPI\Api\MdfeApi;
use ACBrAPI\Api\NfceApi;
use ACBrAPI\Api\NfcomApi;
use ACBrAPI\Api\NfeApi;
use ACBrAPI\Api\NfseApi;

it('returns correct instances for all facade methods', function (string $method, string $expectedClass) {
    expect(ACBr::$method())->toBeInstanceOf($expectedClass);
})->with([
    ['cep', CepApi::class],
    ['cnpj', CnpjApi::class],
    ['conta', ContaApi::class],
    ['cte', CteApi::class],
    ['cteOs', CteOsApi::class],
    ['dce', DceApi::class],
    ['debug', DebugApi::class],
    ['distribuicaoNfe', DistribuioNFEApi::class],
    ['email', EmailApi::class],
    ['empresa', EmpresaApi::class],
    ['mdfe', MdfeApi::class],
    ['nfce', NfceApi::class],
    ['nfcom', NfcomApi::class],
    ['nfe', NfeApi::class],
    ['nfse', NfseApi::class],
]);
