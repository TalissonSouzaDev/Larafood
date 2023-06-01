<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $fillable = ['title','flag','price','description','image','tenant_id'];


    public function filter($filter = null){
        $resultado = $this
        ->where('name','LIKE',"%{$filter}%")
        ->orwhere('description','LIKE',"%{$filter}%")
        ->orwhere('price','LIKE',"%{$filter}%")->paginate(10);
        return $resultado;

    }

    
    public function Tenant(){
        return $this->belongsTo(Tenant::class,'tenant_id','uuid');
    }

    public function category(){
        return $this->belongsToMany(category::class);
    }


    public function productavailable($id,$filter =null){
        $resultado = profile::whereNotIn('id',function($query) use ($id){
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$id}");
        })->where('name','LIKE',"%{$filter}%")->paginate(10);

        return $resultado;
    }
}
