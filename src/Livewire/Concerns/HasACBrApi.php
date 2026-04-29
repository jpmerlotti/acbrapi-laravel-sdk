<?php

namespace ACBr\Laravel\Livewire\Concerns;

use ACBr\Laravel\Facades\ACBr;

trait HasACBrApi
{
    /**
     * Get the ACBr Manager instance.
     */
    protected function acbr()
    {
        return app('acbr');
    }

    /**
     * Simple wrapper for CEP lookup.
     */
    protected function lookupCep(string $cep)
    {
        try {
            return ACBr::cep()->consultarCep($cep);
        } catch (\Exception $e) {
            return null;
        }
    }
}
