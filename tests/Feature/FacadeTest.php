<?php

use ACBr\Laravel\Facades\ACBr;
use ACBrAPI\Api\NfeApi;
use ACBrAPI\Api\CepApi;

it('can instantiate NfeApi through the facade', function () {
    expect(ACBr::nfe())->toBeInstanceOf(NfeApi::class);
});

it('can instantiate CepApi through the facade', function () {
    expect(ACBr::cep())->toBeInstanceOf(CepApi::class);
});
