<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatieresTable extends Migration
{
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('nom');
            $table->text('description');
            $table->integer('sujet_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sujet_id')->references('id')->on('sujets');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}
