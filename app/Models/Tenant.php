<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable =[
        'cnpj','name','email','url','logo','active',
        'subscription','expire_at','subscription_id','subscription_active',
        'subscription_suspended','plan_id'
    ];

    public function plan(){
        return $this->belongsTo(Plan::class,'plan_id','id');
    }

    public function users(){
        return $this->hasMany(User::class,'tenant_id','uuid');
    }

    public function category(){
        return $this->hasMany(category::class,'tenant_id','uuid');
    }

    public function table(){
        return $this->hasMany(tables::class,'tenant_id','uuid');
    }
}
