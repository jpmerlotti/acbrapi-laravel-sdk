<?php

namespace ACBr\Laravel\Livewire;

use Livewire\Component;
use ACBr\Laravel\Livewire\Concerns\HasACBrApi;

class CepLookup extends Component
{
    use HasACBrApi;

    public string $cep = '';
    public bool $loading = false;
    public array $address = [];

    protected $rules = [
        'cep' => 'required|min:8',
    ];

    public function updatedCep($value)
    {
        $cleanCep = preg_replace('/[^0-9]/', '', $value);

        if (strlen($cleanCep) === 8) {
            $this->search();
        }
    }

    public function search()
    {
        $this->loading = true;
        
        $response = $this->lookupCep($this->cep);

        if ($response) {
            $this->address = [
                'logradouro' => $response->getLogradouro(),
                'bairro' => $response->getBairro(),
                'cidade' => $response->getMunicipio(),
                'uf' => $response->getUf(),
                'ibge' => $response->getIbgeMunicipio(),
            ];

            $this->dispatch('acbr-cep-found', $this->address);
        } else {
            $this->addError('cep', 'CEP não encontrado ou erro na API.');
            $this->address = [];
        }

        $this->loading = false;
    }

    public function render()
    {
        return view('acbrapi::livewire.cep-lookup');
    }
}
