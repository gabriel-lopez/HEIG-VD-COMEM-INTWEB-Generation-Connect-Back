<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoumissionsTable extends Migration
{
    public function up()
    {
        Schema::create('soumissions', function (Blueprint $table)
        {
            $table->increments('id');

            $table->integer('requete_id')->unsigned();
            $table->integer('junior_id')->unsigned();
            $table->timestamp('acceptation')->nullable();
            $table->timestamp('proposition')->nullable();
            $table->string('hash')->nullable();

            $table->softDeletes();

            $table->foreign('requete_id')->references('id')->on('requetes');
            $table->foreign('junior_id')->references('id')->on('juniors');
        });
    }

    public function down()
    {
        Schema::dropIfExists('soumissions');
    }
}
