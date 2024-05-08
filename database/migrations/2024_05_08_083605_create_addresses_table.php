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
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('street', 255);
            $table->string('city', 100);
            $table->string('postalCode', 20);
            $table->string('country', 100);
            $table->string('customerEmail', 255);
            $table->uuid('userId')->nullable();
            $table->timestamps();

            $table->foreign('customerEmail')->references('email')->on('customers');
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('addresses_customeremail_foreign');
            $table->dropForeign('addresses_userid_foreign');
        });
        Schema::dropIfExists('addresses');
    }
};
