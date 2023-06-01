<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable =['name','description'];
    public function filter($filter = null){
        $resultado = $this
        ->where('name','LIKE',"%{$filter}%")->paginate(10);
        return $resultado;

    }


    public function permission(){
        return $this->belongsToMany(Permission::class);
    }

    public function plan(){
        return $this->belongsToMany(Plan::class);
    }

    public function profileAvailable($id,$filter = null){
     
        $permission = Permission::whereNotIn('id',function($query) use ($id){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$id}");
        })->where('permissions.name','LIKE',"%{$filter}%")->paginate();
   

        return  $permission;

    }
}
