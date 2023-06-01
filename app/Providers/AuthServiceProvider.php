<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $permission = Permission::all();

        foreach($permission as $permissions){
            Gate::define('permission',function(User $user) use ($permissions){
                return $user->hasPermission($permissions->name);
            });
        }

        Gate::define('owner',function(User $user, $object){
            return $user->id === $object->user_id;
        });

        Gate::before(function (User $user){
                  if($user->isAdmin()){
                    return true;
                  }
            });

    }
}
