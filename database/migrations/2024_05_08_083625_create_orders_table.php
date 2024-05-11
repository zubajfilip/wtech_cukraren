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

        // DB::unprepared("CREATE TYPE paymentMethodType AS ENUM ('applePay', 'creditCard', 'cashOnDelivery');");

        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('orderStatusId')->references('id')->on('orderStatuses');// ['pending', 'canceled', 'completed']);
            $table->string('customerEmail', 255);
            $table->string('customerPhoneNumber', 13)->nullable();
            // $table->addColumn('paymentMethod', 'paymentMethodType');
            $table->foreignUuid('paymentMethod')->references('id')->on('payments');
            $table->foreignUuid('deliveryMethod')->references('id')->on('deliveries'); //['personalDelivery', 'courier']);
            $table->foreignUuid('deliveryAddressId')->references('id')->on('addresses');
            $table->decimal('price', 10, 2);
            $table->timestamps();
            
            // $table->foreign('deliveryMethod')->references('name')->on('deliveries'); //['personalDelivery', 'courier']);
            // $table->foreign('paymentMethod')->references('name')->on('payments');//['applePay', 'creditCard', 'cashOnDelivery']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_deliveryaddressid_foreign');
            $table->dropForeign('orders_deliverymethod_foreign');
            $table->dropForeign('orders_paymentmethod_foreign');
            $table->dropForeign('orders_orderstatusid_foreign');
        });
        Schema::dropIfExists('orders');
    }
};
