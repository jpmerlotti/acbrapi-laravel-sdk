<?php

namespace ACBr\Laravel;

use ACBr\Api\CepApi;
use ACBr\Api\CnpjApi;
use ACBr\Api\NfeApi;
use ACBr\Api\NfceApi;
use GuzzleHttp\Client;
use ACBr\Configuration;

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

    public function nfe(): NfeApi
    {
        return new NfeApi(
            new Client(['timeout' => $this->config['timeout']]),
            $this->sdkConfig
        );
    }

    public function nfce(): NfceApi
    {
        return new NfceApi(
            new Client(['timeout' => $this->config['timeout']]),
            $this->sdkConfig
        );
    }

    public function cep(): CepApi
    {
        return new CepApi(
            new Client(['timeout' => $this->config['timeout']]),
            $this->sdkConfig
        );
    }

    public function cnpj(): CnpjApi
    {
        return new CnpjApi(
            new Client(['timeout' => $this->config['timeout']]),
            $this->sdkConfig
        );
    }
}
