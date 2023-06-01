<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scope\TenantScope;

trait TenantTrait {


    protected static function booted()
    {
        parent::booted();
        static::observe(TenantObserver::class);
        static::addGlobalScope(new TenantScope);
    }
}
