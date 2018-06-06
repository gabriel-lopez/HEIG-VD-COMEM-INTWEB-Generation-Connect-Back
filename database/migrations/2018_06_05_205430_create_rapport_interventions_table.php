<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapportInterventionsTable extends Migration
{
    public function up()
    {
        Schema::create('rapports_interventions', function (Blueprint $table)
        {
            $table->increments('id');

            $table->boolean('servicerendu');
            $table->text('commentaire');
            $table->time('tempspasse'); //tempspassé
            $table->timestamp('fin');
            $table->timestamp('debut');
            $table->enum('noteSmiley', ["0", "1", "2", "3"]);
            $table->integer('intervention_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('intervention_id')->references('id')->on('interventions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rapports_interventions');
    }
}
