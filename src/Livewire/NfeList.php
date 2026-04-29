<?php

namespace ACBr\Laravel\Livewire;

class NfeList extends BaseDocumentList
{
    public $type = 'NFe';

    public function render()
    {
        return view('acbrapi::livewire.nfe-list', [
            'documents' => $this->documents
        ]);
    }
}
