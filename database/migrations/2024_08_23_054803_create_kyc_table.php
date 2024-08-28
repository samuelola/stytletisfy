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
        Schema::create('kyc', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->string('team_size')->nullable();
            $table->text('business_name')->nullable();
            $table->text('business_description')->nullable();
            $table->text('corporation_type')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc');
    }
};
