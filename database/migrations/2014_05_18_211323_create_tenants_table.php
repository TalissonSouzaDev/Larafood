<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('url')->unique();
            $table->string('logo')->nullable();
    

            // STATUS TENANT (SE INATIVO "N" ELE PERDE O ACESSO)
            $table->enum('active',['Y','N'])->default('Y');

            //SUBSCRIPTION
            $table->date('subscription')->nullable();
            $table->date('expire_at')->nullable();
            $table->string('subscription_id',255)->nullable();
            $table->boolean('subscription_active')->default(false);
            $table->boolean('subscription_suspended')->default(false);


          
            $table->timestamps();

            $table->foreignId('plan_id')->constrained('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
};
