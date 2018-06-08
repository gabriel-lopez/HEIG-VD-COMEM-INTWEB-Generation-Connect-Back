<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuniorMatiereTable extends Migration
{
    public function up()
    {
        Schema::create('junior_matiere', function (Blueprint $table)
        {
            $table->integer('matiere_id');
            $table->integer('junior_user_id');

            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->foreign('junior_user_id')->references('id')->on('juniors');

            $table->primary(['matiere_id', 'junior_user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('junior_matiere');
    }
}
