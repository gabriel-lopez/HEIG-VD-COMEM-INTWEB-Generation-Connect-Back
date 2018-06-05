<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    public function up()
    {
        Schema::create('formations', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('nom')->unique();
            $table->text("description");
            $table->integer('plageHoraire')->unsigned();
            $table->integer("employe_id")->unsigned();

            $table->foreign('plagehoraire_id')->references('id')->on('plageshoraires');
            $table->foreign('senior_id')->references('id')->on('seniors');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formations');
    }
}
