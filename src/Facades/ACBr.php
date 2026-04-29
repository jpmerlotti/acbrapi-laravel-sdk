<?php

namespace ACBr\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \ACBrAPI\Api\NfeApi nfe()
 * @method static \ACBrAPI\Api\NfceApi nfce()
 * @method static \ACBrAPI\Api\CepApi cep()
 * @method static \ACBrAPI\Api\CnpjApi cnpj()
 * 
 * @see \ACBr\Laravel\ACBrManager
 */
class ACBr extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'acbr';
    }
}
