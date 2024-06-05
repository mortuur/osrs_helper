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
            $table->string('name');
            $table->boolean('tradeable_on_ge');
            $table->boolean('members');
            $table->integer('linked_id_item')->nullable();
            $table->integer('linked_id_noted')->nullable();
            $table->integer('linked_id_placeholder')->nullable();
            $table->boolean('noted');
            $table->boolean('noteable');
            $table->boolean('placeholder');
            $table->boolean('stackable');
            $table->boolean('equipable');
            $table->integer('cost');
            $table->integer('lowalch');
            $table->integer('highalch');
            $table->integer('stacked')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
