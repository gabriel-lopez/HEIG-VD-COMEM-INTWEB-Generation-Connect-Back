<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatiereSeniorTable extends Migration
{
    public function up()
    {
        Schema::create('matiere_senior', function (Blueprint $table)
        {
            $table->integer('matiere_id')->unsigned();
            $table->integer('senior_id')->unsigned;

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->foreign('senior_id')->references('id')->on('seniors');

            $table->primary(['matiere_id', 'senior_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('matiere_senior');
    }
}
