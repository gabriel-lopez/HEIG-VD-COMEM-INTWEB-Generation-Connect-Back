<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequetesTable extends Migration
{
    public function up()
    {
        Schema::create('requetes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('matiere_id');

            $table->enum('type', ['urgent','unique','repetitif']);
            $table->enum('statut',['nontraite','envoye','accepte']); // nontraité, envoyé, accepté
            $table->integer('soumis_par');
            $table->integer('plageHoraire_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('matiere_id')->reference('id')->on('matieres');
            $table->foreign('soumis_par')->reference('id')->on('seniors');
            $table->foreign('plageHoraire_id')->reference('id')->on('plageshoraires');
        });
    }

    public function down()
    {
        Schema::dropIfExists('requetes');
    }
}
