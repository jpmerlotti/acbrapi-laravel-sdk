<?php

namespace ACBr\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \ACBrAPI\Api\CepApi cep()
 * @method static \ACBrAPI\Api\CnpjApi cnpj()
 * @method static \ACBrAPI\Api\ContaApi conta()
 * @method static \ACBrAPI\Api\CteApi cte()
 * @method static \ACBrAPI\Api\CteOsApi cteOs()
 * @method static \ACBrAPI\Api\DceApi dce()
 * @method static \ACBrAPI\Api\DebugApi debug()
 * @method static \ACBrAPI\Api\DistribuioNFEApi distribuicaoNfe()
 * @method static \ACBrAPI\Api\EmailApi email()
 * @method static \ACBrAPI\Api\EmpresaApi empresa()
 * @method static \ACBrAPI\Api\MdfeApi mdfe()
 * @method static \ACBrAPI\Api\NfceApi nfce()
 * @method static \ACBrAPI\Api\NfcomApi nfcom()
 * @method static \ACBrAPI\Api\NfeApi nfe()
 * @method static \ACBrAPI\Api\NfseApi nfse()
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
