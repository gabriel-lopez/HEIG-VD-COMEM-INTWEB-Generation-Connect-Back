<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuniorsTable extends Migration
{
    public function up()
    {
        Schema::create('juniors', function (Blueprint $table)
        {
            $table->increments('id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('juniors');
    }
}
