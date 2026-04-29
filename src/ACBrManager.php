<?php

namespace ACBr\Laravel;

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
use GuzzleHttp\Client;
use ACBrAPI\Configuration;

class ACBrManager
{
    protected array $config;
    protected Configuration $sdkConfig;

    public function __construct(array $config)
    {
        $this->config = $config;
        
        $this->sdkConfig = new Configuration();
        $this->sdkConfig->setApiKey('x-api-key', $config['token']);
        $this->sdkConfig->setHost($config['endpoints'][$config['environment']] ?? $config['endpoints']['sandbox']);
    }

    protected function getClient(): Client
    {
        return new Client([
            'timeout' => $this->config['timeout'],
        ]);
    }

    public function cep(): CepApi
    {
        return new CepApi($this->getClient(), $this->sdkConfig);
    }

    public function cnpj(): CnpjApi
    {
        return new CnpjApi($this->getClient(), $this->sdkConfig);
    }

    public function conta(): ContaApi
    {
        return new ContaApi($this->getClient(), $this->sdkConfig);
    }

    public function cte(): CteApi
    {
        return new CteApi($this->getClient(), $this->sdkConfig);
    }

    public function cteOs(): CteOsApi
    {
        return new CteOsApi($this->getClient(), $this->sdkConfig);
    }

    public function dce(): DceApi
    {
        return new DceApi($this->getClient(), $this->sdkConfig);
    }

    public function debug(): DebugApi
    {
        return new DebugApi($this->getClient(), $this->sdkConfig);
    }

    public function distribuicaoNfe(): DistribuioNFEApi
    {
        return new DistribuioNFEApi($this->getClient(), $this->sdkConfig);
    }

    public function email(): EmailApi
    {
        return new EmailApi($this->getClient(), $this->sdkConfig);
    }

    public function empresa(): EmpresaApi
    {
        return new EmpresaApi($this->getClient(), $this->sdkConfig);
    }

    public function mdfe(): MdfeApi
    {
        return new MdfeApi($this->getClient(), $this->sdkConfig);
    }

    public function nfce(): NfceApi
    {
        return new NfceApi($this->getClient(), $this->sdkConfig);
    }

    public function nfcom(): NfcomApi
    {
        return new NfcomApi($this->getClient(), $this->sdkConfig);
    }

    public function nfe(): NfeApi
    {
        return new NfeApi($this->getClient(), $this->sdkConfig);
    }

    public function nfse(): NfseApi
    {
        return new NfseApi($this->getClient(), $this->sdkConfig);
    }
}
