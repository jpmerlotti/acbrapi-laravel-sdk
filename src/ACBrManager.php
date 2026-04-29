<?php

namespace ACBr\Laravel;

use ACBrAPI\Configuration;
use ACBrAPI\Api\NfeApi;
use ACBrAPI\Api\NfceApi;
use ACBrAPI\Api\CepApi;
use ACBrAPI\Api\CnpjApi;
use GuzzleHttp\Client;

class ACBrManager
{
    protected array $config;
    protected Configuration $apiConfig;
    protected Client $httpClient;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->setupApiConfig();
    }

    protected function setupApiConfig()
    {
        $this->apiConfig = new Configuration();
        
        // Configura o Token (Bearer)
        $this->apiConfig->setAccessToken($this->config['token']);
        
        // Define o ambiente
        if ($this->config['environment'] === 'sandbox') {
            $this->apiConfig->setHost('https://sandbox.acbr.api.br');
        } else {
            $this->apiConfig->setHost('https://prod.acbr.api.br');
        }

        $this->httpClient = new Client([
            'timeout' => $this->config['timeout'] ?? 30,
        ]);
    }

    /**
     * Retorna a API de NFe
     */
    public function nfe(): NfeApi
    {
        return new NfeApi($this->httpClient, $this->apiConfig);
    }

    /**
     * Retorna a API de NFCe
     */
    public function nfce(): NfceApi
    {
        return new NfceApi($this->httpClient, $this->apiConfig);
    }

    /**
     * Retorna a API de consulta de CEP
     */
    public function cep(): CepApi
    {
        return new CepApi($this->httpClient, $this->apiConfig);
    }

    /**
     * Retorna a API de consulta de CNPJ
     */
    public function cnpj(): CnpjApi
    {
        return new CnpjApi($this->httpClient, $this->apiConfig);
    }

    // Outros métodos para CTe, MDFe, etc podem ser adicionados aqui seguindo o mesmo padrão
}
