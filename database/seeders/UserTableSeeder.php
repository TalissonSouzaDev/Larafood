<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     
    public function run()
    {
        $tenant = Tenant::first();
        User::create([
            "tenant_id" => $tenant->uuid,
            'name'=>'talisson souza',
            'email'=>'talisson@teste.com',
            'password'=> bcrypt('123456'),
            
        ]);
    }
}
