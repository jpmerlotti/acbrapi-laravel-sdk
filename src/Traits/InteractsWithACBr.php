<?php

namespace ACBr\Laravel\Traits;

use ACBr\Laravel\Models\AcbrCompany;
use ACBr\Laravel\Models\AcbrDocument;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait InteractsWithACBr
{
    /**
     * Get the ACBr company associated with this model.
     */
    public function acbrCompany(): MorphOne
    {
        return $this->morphOne(AcbrCompany::class, 'owner');
    }

    /**
     * Get all ACBr documents associated with this model through the ACBr company.
     */
    public function acbrDocuments()
    {
        return $this->hasManyThrough(
            AcbrDocument::class,
            AcbrCompany::class,
            'owner_id',
            'acbr_company_id',
            $this->getKeyName(),
            'id'
        )->where('owner_type', $this->getMorphClass());
    }

    /**
     * Shortcut to get the ACBr API instance for this model's company.
     */
    public function acbr()
    {
        $company = $this->acbrCompany;
        
        if (!$company) {
            return app('acbr'); // Return default instance if no specific company
        }

        // Return a custom instance with company credentials if needed
        // This is a placeholder for future implementation of dynamic authentication
        return app('acbr'); 
    }
}
