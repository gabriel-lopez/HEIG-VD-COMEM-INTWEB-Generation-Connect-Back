<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoumissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soumissions', function (Blueprint $table) {
            $table->integer('requete_id')->unsigned();
            $table->integer('junior_id')->unsigned();
            $table->timestamp('acceptation');
            $table->timestamp('proposition');


            $table->foreign('requete_id')->references('id')->on('requetes');
            $table->foreign('junior_id')->references('id')->on('juniors');
            $table->primary(['requete_id','junior_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soumissions');
    }
}
