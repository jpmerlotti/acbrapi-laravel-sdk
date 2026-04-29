<?php

namespace ACBr\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \ACBr\Api\NfeApi nfe()
 * @method static \ACBr\Api\NfceApi nfce()
 * @method static \ACBr\Api\CepApi cep()
 * @method static \ACBr\Api\CnpjApi cnpj()
 *
 * @see \ACBr\Laravel\ACBrManager
 */
class ACBr extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'acbr';
    }
}
