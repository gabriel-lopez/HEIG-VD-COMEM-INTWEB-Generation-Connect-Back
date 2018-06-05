<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeniorsTable extends Migration
{
    public function up()
    {
        Schema::create('seniors', function (Blueprint $table)
        {
            $table->integer('id')->unsigned()->unique();

            $table->enum('preference', ['email', 'telephone']);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seniors');
    }
}
