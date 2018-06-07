<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapportsInterventionsTable extends Migration
{
    public function up()
    {
        Schema::create('rapports_interventions', function (Blueprint $table)
        {
            $table->increments('id');

            $table->boolean('servicerendu');
            $table->text('commentaire');
            $table->time('tempspasse'); //tempspassé
            $table->timestamp('fin')->nullable();
            $table->timestamp('debut')->nullable();
            $table->enum('noteSmiley', ["0", "1", "2", "3"]);
            $table->integer('intervention_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('intervention_id')->references('id')->on('interventions');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rapports_interventions');
    }
}
