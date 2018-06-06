<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuniorPlageHoraireTable extends Migration
{
    public function up()
    {
        Schema::create('junior_plage_horaire', function (Blueprint $table)
        {
            $table->integer('junior_id');
            $table->integer('plage_horaire_id');

            $table->foreign('junior_id')->references('id')->on('juniors');
            $table->foreign('plage_horaire_id')->references('id')->on('plages_horaires');

            $table->primary(['junior_id', 'plage_horaire_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('junior_plage_horaire');
    }
}
