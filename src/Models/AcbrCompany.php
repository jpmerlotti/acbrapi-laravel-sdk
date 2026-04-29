<?php

namespace ACBr\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcbrCompany extends Model
{
    protected $fillable = [
        'owner_id',
        'owner_type',
        'name',
        'cnpj',
        'client_id',
        'client_secret',
        'settings',
    ];

    protected $casts = [
        'settings' => 'array',
    ];

    public function owner()
    {
        return $this->morphTo();
    }

    public function documents(): HasMany
    {
        return $this->hasMany(AcbrDocument::class);
    }

    public function searches(): HasMany
    {
        return $this->hasMany(AcbrSearch::class);
    }
}
