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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('flag')->unique();
            $table->double('price',10,2);
            $table->text('description')->nullable();
            $table->string('image')->unique();
            $table->uuid('tenant_id')->index();
            $table->foreign('tenant_id')->references('uuid')->on('tenants')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('category')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('category_product');
    }
};
