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
            $table->integer('user_id')->unsigned()->unique();

            $table->enum('preference', ['email', 'telephone']);
            $table->integer("forfait_id")->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('forfait_id')->references('id')->on('forfaits');
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
