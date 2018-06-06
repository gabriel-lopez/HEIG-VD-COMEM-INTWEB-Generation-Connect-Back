<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlagesHorairesTable extends Migration
{
    public function up()
    {
        Schema::create('plages_horaires', function (Blueprint $table)
        {
            $table->increments('id');

            $table->enum("JourSemaine", ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"]);
            $table->time('HDebut');
            $table->time('HFin');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plages_horaires');
    }
}
