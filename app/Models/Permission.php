<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable =['name','description'];
    public function filter($filter = null){
        $resultado = $this
        ->where('name','LIKE',"%{$filter}%")->paginate(10);
        return $resultado;

    }

    public function profile(){
        return $this->belongsToMany(Profile::class);    }

        
    public function role(){
        return $this->belongsToMany(Role::class);    }
}
