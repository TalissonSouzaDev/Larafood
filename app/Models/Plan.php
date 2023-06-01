<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'plans';
    protected $fillable = [
        'name','url','price','description'
    ];



    public function filter($filter = null){
        $resultado = $this
        ->where('name','LIKE',"%{$filter}%")
        ->orwhere('price','LIKE',"%{$filter}%")->paginate(10);
        return $resultado;

    }

    public function details(){
        return $this->hasMany(DetailPlan::class);
    }

    public function tenants(){
        return $this->hasMany(Tenant::class,'plan_id','id');
    }

    public function profile(){
        return $this->belongsToMany(Profile::class);
    }

    public function planavailable($id,$filter =null){
        $resultado = profile::whereNotIn('id',function($query) use ($id){
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$id}");
        })->where('name','LIKE',"%{$filter}%")->paginate(10);

        return $resultado;
    }
}
