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
        Schema::create('categoryProducts', function (Blueprint $table) {
            $table->foreignUuid('productId')->references('id')->on('products');
            $table->foreignUuid('categoryId')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categoryProducts', function (Blueprint $table) {
            $table->dropForeign('categoryproducts_productid_foreign');
            $table->dropForeign('categoryproducts_categoryid_foreign');
        });
        Schema::dropIfExists('categoryProducts');
        
    }
};
