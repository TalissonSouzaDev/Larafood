<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $fillable=  ["name","description"];

    public function permissons() {
        return $this->belongsToMany(permission::class);
    }

    public function permissionsAvailable($filter =  null ,$idprofile) {
        
        $permission = permission::whereNotIn("permission.id",function($query) use ($idprofile) {
            $query->select("permission_profile.permission_id");
            $query->from("permission_profile");
            $query->whereraw("permission_profile.profile_id={$idprofile}");
        })
        ->where("permissions.name","LIKE","%{$filter}%")
        ->paginate();

        // -> tosql dd($permsision)

        return $permission;
    }
}
