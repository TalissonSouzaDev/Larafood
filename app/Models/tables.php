<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tables extends Model
{
    use HasFactory;
    use TenantTrait;
    protected $fillable = [
        'identify', 'description', 'tenant_id'
    ];

    public function filter($filter = null){
        $resultado = $this
        ->where('identify','LIKE',"%{$filter}%")
        ->orwhere('description','LIKE',"%{$filter}%")->paginate(10);
        return $resultado;

    }

    public function Tenant(){
        return $this->belongsTo(Tenant::class,'tenant_id','uuid');
    }
}
