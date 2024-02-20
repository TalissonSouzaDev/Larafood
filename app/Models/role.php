<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $fillable = ["name","description"];


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function profileAvailable($id,$filter = null){
     
        $permission = Permission::whereNotIn('id',function($query) use ($id){
            $query->select('permissions_role.permission_id');
            $query->from('permissions_role');
            $query->whereRaw("permissions_role.role_id={$id}");
        })->where('permissions.name','LIKE',"%{$filter}%")->paginate();
   

        return  $permission;

    }
}
