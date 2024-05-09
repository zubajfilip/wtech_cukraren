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
        Schema::create('shoppingCarts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignid('userId')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shoppingCarts', function (Blueprint $table) {
            $table->dropForeign('shoppingcarts_userid_foreign');
        });
        Schema::dropIfExists('shoppingCarts');
    }
};
