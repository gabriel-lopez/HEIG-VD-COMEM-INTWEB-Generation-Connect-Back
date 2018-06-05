<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationUserTable extends Migration
{
    public function up()
    {
        Schema::create('formation_user', function (Blueprint $table)
        {
            $table->increments('id');

            $table->integer('formation_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('formation_id')->references('id')->on('formations');

            $table->primary(['formation_id', 'user_id']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formation_user');
    }
}
