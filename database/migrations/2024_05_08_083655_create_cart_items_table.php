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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('shoppingCartId');
            $table->uuid('productId');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('shoppingCartId')->references('id')->on('shopping_carts');
            $table->foreign('productId')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign('cart_items_shoppingcartid_foreign');
            $table->dropForeign('cart_items_productid_foreign');
        });
        Schema::dropIfExists('cart_items');
    }
};
