<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InterventionRequete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention_requete', function (Blueprint $table)
        {

            $table->integer("requete_id")->unsigned();
            $table->integer("intervention_id")->unsigned();

            $table->foreign('requete_id')->references('id')->on('requete');
            $table->foreign('intervention_id')->references('id')->on('intervention');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        {
            Schema::dropIfExists('plages_repetitives');
        }
    }
}
