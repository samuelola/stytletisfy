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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('team_size')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_description')->nullable();
            $table->string('business_email')->nullable();
            $table->string('corperate_type')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->text('social')->nullable();
            $table->string('position')->nullable();
            $table->string('title')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
