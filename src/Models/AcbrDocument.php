<?php

namespace ACBr\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcbrDocument extends Model
{
    protected $fillable = [
        'acbr_company_id',
        'type',
        'external_id',
        'status',
        'xml_path',
        'pdf_path',
        'payload',
        'response',
    ];

    protected $casts = [
        'payload' => 'array',
        'response' => 'array',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(AcbrCompany::class, 'acbr_company_id');
    }
}
