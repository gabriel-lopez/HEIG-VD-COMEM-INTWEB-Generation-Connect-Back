<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterventionsTable extends Migration
{
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table)
        {
            $table->increments('id');

            $table->enum('statut', ['planifie','annule','finalise']); //planifié, annulé, finalisé
            $table->timestamp('finprevu')->nullable();
            $table->timestamp('debutprevu')->nullable();
            $table->integer('junior_affecte')->unsigned();
            $table->integer('requete_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('junior_affecte')->references('id')->on('juniors');
            $table->foreign('requete_id')->references('id')->on('requetes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('interventions');
    }
}
