<?php

namespace ACBr\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcbrSearch extends Model
{
    protected $fillable = [
        'acbr_company_id',
        'type',
        'query',
        'result',
    ];

    protected $casts = [
        'result' => 'array',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(AcbrCompany::class, 'acbr_company_id');
    }
}
