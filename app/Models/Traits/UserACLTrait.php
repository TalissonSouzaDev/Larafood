<?php

namespace App\Models\Traits;


trait UserACLTrait {


    public function permissions(){
        $tenat = $this->tenant;
        $plan = $tenat->plan;
        $permissions = [];

        foreach($plan->profile as $profile){
            foreach($profile->permission as $permission){
                array_push($permissions,$permission->name);
            }
        }

        return  $permissions;
    }



    public function hasPermission(string $permissionname): bool {

        return in_array($permissionname,$this->permissions());
    }

    public function isAdmin(){
        return in_array($this->email ,config('acl.admins'));
    }

    public function isTenant(){
        return !in_array($this->email ,config('acl.admins'));
    }
}