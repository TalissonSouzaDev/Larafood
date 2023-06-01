<?php

namespace Database\Seeders;
use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan = Plan::first();
        $plan->tenants()->create([
            'cnpj'=> '2548787545454',
            'name'=> 'talissonsouza',
            'email' => 'talissonsouza@gmail.com',
            'plan_id' => '1'
        ]);
    }
}
