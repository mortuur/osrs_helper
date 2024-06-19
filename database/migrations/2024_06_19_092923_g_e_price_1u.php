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
        Schema::create('ge_price_1u', function (Blueprint $table) {
        
            $table->id();
            $table->biginteger('item_id')->unique();
            $table->integer('avgHighPrice')->nullable();
            $table->integer('highPriceVolume');
            $table->integer('avgLowPrice')->nullable();
            $table->integer('lowPriceVolume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ge_price_1u');
    }
};
