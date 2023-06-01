<?php

namespace App\Providers;

use App\Models\category;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Tenant;
use App\Observers\CategoryObserver;
use App\Observers\PlanObserver;
use App\Observers\ProductObserver;
use App\Observers\TenantsObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantsObserver::class);
        category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}
