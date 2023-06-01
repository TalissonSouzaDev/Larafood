<?php

namespace App\Models;


use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $table = "category";

    protected $fillable =[ 'name','url','description','tenant_id'];

    public function filter($filter = null){
        $resultado = $this
        ->where('name','LIKE',"%{$filter}%")
        ->orwhere('description','LIKE',"%{$filter}%")->paginate(10);
        return $resultado;

    }

    
    public function Tenant(){
        return $this->belongsTo(Tenant::class,'tenant_id','uuid');
    }

    public function product(){
        return $this->belongsToMany(Product::class);
    }

 
}
