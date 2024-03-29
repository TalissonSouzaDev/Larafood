<?php
namespace App\Services;

use App\Models\Plan;
use App\Models\User;

class TenantService
{
        private $plan,$data = [];

    public function __construct(Plan $plan,array $data)
    {
        $this->plan = $plan;
        $this->data = $data;
    }
public function make(){
    $tenant = $this->storeTenant();
    $user = $this->storeUser($tenant);
    return $user;

}

public function storeTenant(){
    $data = $this->data;
    $tenant = $this->plan->tenants()->create([
        'cnpj'=>$data['cnpj'],
        'name'=>$data['empresa'],
        'email'=>$data['email'],
        'subscription' => now(),
        'expires_at' => now()->addDays(7)
    ]);
    return $tenant;

}



public function storeUser($tenant){
    $data = $this->data;
    $user = User::create([
        'tenant_id' => $tenant->uuid,
        'name'=>$data['name'],
        'email'=>$data['name'],
        'password'=>bcrypt($data['password'])
    ]);
    return $user;

}



}

?>