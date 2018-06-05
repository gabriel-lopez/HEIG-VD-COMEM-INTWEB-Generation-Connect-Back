<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterventionsTable extends Migration
{

    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('statut', ['planifie','annule','finalise']); //planifié, annulé, finalisé
            $table->timestamp('finprevu');
            $table->timestamp('debutprevu');
            $table->integer('junior_affecte');
            $table->integer('requete_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('junior_affecte')->references('id')->on('juniors');
            $table->foreign('lie_a')->references('id')->on('requetes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interventions');
    }
}
