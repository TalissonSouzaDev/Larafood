<?php
namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver {

    /**
     * Handle the Plan "created" event.
     *
     * @param  \App\Models\Model  $model
     * @return void
     */
    public function creating(Model $model)
    {
        $tenant = new ManagerTenant();
        $model->tenant_id = $tenant->getTenantIdentify();
    }

 
}