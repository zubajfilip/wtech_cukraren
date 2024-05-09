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
        Schema::create('cartItems', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('shoppingCartId')->references('id')->on('shoppingCarts');
            $table->foreignUuid('productId')->references('id')->on('products');
            $table->integer('quantity');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cartItems', function (Blueprint $table) {
            $table->dropForeign('cartitems_shoppingcartid_foreign');
            $table->dropForeign('cartitems_productid_foreign');
        });
        Schema::dropIfExists('cartItems');
    }
};
