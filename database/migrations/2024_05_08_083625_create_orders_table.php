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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('orderDate');
            $table->enum('orderStatus', ['pending', 'canceled', 'completed']);
            $table->string('customerEmail', 255);
            $table->string('customerPhoneNumber', 13)->nullable();
            $table->enum('paymentMethod', ['applePay', 'creditCard', 'cashOnDelivery']);
            $table->enum('deliveryMethod', ['personalDelivery', 'courier']);
            $table->uuid('deliveryAddressId');
            $table->timestamps();

            $table->foreign('deliveryAddressId')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_deliveryaddressid_foreign');
        });
        Schema::dropIfExists('orders');
    }
};
