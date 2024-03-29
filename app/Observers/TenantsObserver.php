<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantsObserver
{
    /**
     * Handle the Tenant "created" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::Kebab($tenant->name);
    }

    /**
     * Handle the Tenant "updated" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function updating(Tenant $tenant)
    {
        $tenant->url = Str::Kebab($tenant->name);
    }

  
}
