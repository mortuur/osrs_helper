<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("examine");
            $table->bigInteger('item_id')->unique();
            $table->boolean('members');
            $table->integer('lowalch')->nullable();
            $table->integer('limit');
            $table->integer('value')->default(0);
            $table->integer('highalch')->nullable();
            $table->string('icon');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
