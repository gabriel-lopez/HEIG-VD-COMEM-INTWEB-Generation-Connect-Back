<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationServicesTable extends Migration
{
    public function up()
    {
        Schema::create('evaluation_services', function (Blueprint $table)
        {
            $table->increments('id');

            $table->text('commentaire');
            $table->enum('noteSmiley', ['0', '1', '2', '3']);

            $table->integer('senior_id')->unsigned();
            $table->integer('intervention_id')->unsigned();

            $table->foreign('senior_id')->references('id')->on('seniors');
            $table->foreign('intervention_id')->references('id')->on('interventions');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluation_services');
    }
}
