<?php

namespace App\Models;

use App\Models\Traits\UserACLTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,UserACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'password',
    
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Tenant(){
        return $this->belongsTo(Tenant::class,'tenant_id','uuid');
    }

    public function roles()
    {
        return $this->belongsToMany(role::class);
    }

    

    public function filter($filter = null){
        $resultado = $this
        ->where('name','LIKE',"%{$filter}%")
        ->orwhere('email','LIKE',"%{$filter}%")->paginate(10);
        return $resultado;

    }


    public function rolesAvailable($id,$filter = null){
     
        $role = role::whereNotIn('roles.id',function($query) use ($id){
            $query->select('role_user.role_id');
            $query->from('role_user');
            $query->whereRaw("role_user.user_id={$id}");
        })->where('roles.name','LIKE',"%{$filter}%")->paginate();
   

        return  $role;

    
}
}
