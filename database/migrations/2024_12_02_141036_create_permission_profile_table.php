<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permission_profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("permission_id");
            $table->unsignedBigInteger("profile_id");

            $table->foreign("permission_id")
                    ->references("id")
                    ->on("permissions")
                    ->onDelete("cascade");

            $table->foreign("profile_id")
                    ->references("id")
                    ->on("profiles")
                    ->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_profile');
    }
};
