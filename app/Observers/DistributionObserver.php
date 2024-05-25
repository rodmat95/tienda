<?php

namespace App\Observers;

use App\Models\Distribution;

class DistributionObserver
{
    /**
     * Handle the Distribution "created" event.
     */
    public function creating(Distribution $distribution)
    {
        if (! \App::runningInConsole()) {
            $distribution->supplier_id = auth()->user()->id;
        }
        
    }
}