<?php

namespace ACBr\Laravel\Livewire;

use ACBr\Laravel\Models\AcbrDocument;
use Livewire\Component;
use Livewire\WithPagination;

abstract class BaseDocumentList extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $type = ''; // Should be overridden by child classes (e.g., 'NFe')

    protected $queryString = ['search', 'status'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getDocumentsProperty()
    {
        return AcbrDocument::query()
            ->when($this->type, fn($q) => $q->where('type', $this->type))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->search, function ($q) {
                $q->where(function($query) {
                    $query->where('external_id', 'like', '%' . $this->search . '%')
                          ->orWhere('payload', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10);
    }

    abstract public function render();
}
