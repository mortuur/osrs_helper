<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeLogsTable extends Migration
{
    public function up()
    {
        Schema::create('exchange_logs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('state');
            $table->integer('slot');
            $table->integer('item');
            $table->integer('qty');
            $table->integer('worth');
            $table->integer('max');
            $table->integer('offer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exchange_logs');
    }
}
