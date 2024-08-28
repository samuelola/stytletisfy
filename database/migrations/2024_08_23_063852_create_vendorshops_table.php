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
        Schema::create('vendorshops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_image')->nullable();
            $table->unsignedInteger('user_id')->index();
            $table->text('shipping_rules');
            $table->text('store_location');
            $table->text('store_description');
            $table->text('shipping_policy');
            $table->text('refund_policy');
            $table->text('cancellation');
            $table->unsignedInteger('product_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamp('store_open_time')->nullable();
            $table->timestamp('store_close_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendorshops');
    }
};
