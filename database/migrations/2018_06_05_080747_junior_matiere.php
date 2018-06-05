<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JuniorMatiere extends Migration
{

    public function up()
    {
        Schema::create('junior_matiere', function (Blueprint $table) {


            $table->integer('matiere_id');
            $table->integer('junior_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('matiere_id')
                ->references('id')->on('matieres');

            $table->foreign('junior_id')
                ->references('id')->on('juniors');

        });

    }


    public function down()
    {
        Schema::dropIfExists('junior_matiere');
    }
}
