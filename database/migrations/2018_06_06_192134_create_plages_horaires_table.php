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

            $table->enum("joursemaine", ["lundi", "mardi", "mercredi", "jeudi", "vendredi"]);
            $table->time('heuredebut');
            $table->time('heurefin');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plages_horaires');
    }
}
