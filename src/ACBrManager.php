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
        
        // Setup Token (Bearer)
        $this->apiConfig->setAccessToken($this->config['token']);
        
        // Define environment
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
     * Get the NFe API instance
     */
    public function nfe(): NfeApi
    {
        return new NfeApi($this->httpClient, $this->apiConfig);
    }

    /**
     * Get the NFCe API instance
     */
    public function nfce(): NfceApi
    {
        return new NfceApi($this->httpClient, $this->apiConfig);
    }

    /**
     * Get the Zip Code (CEP) lookup API instance
     */
    public function cep(): CepApi
    {
        return new CepApi($this->httpClient, $this->apiConfig);
    }

    /**
     * Get the Company (CNPJ) lookup API instance
     */
    public function cnpj(): CnpjApi
    {
        return new CnpjApi($this->httpClient, $this->apiConfig);
    }

    // Other methods for CTe, MDFe, etc can be added here following the same pattern
}
