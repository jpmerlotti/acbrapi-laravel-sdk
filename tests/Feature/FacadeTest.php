<?php

use ACBr\Laravel\Facades\ACBr;
use ACBr\Api\NfeApi;

it('can access the nfe api via facade', function () {
    expect(ACBr::nfe())->toBeInstanceOf(NfeApi::class);
});
