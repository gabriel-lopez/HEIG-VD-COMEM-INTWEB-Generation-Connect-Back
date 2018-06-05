<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatieresSeniors extends Migration
{

    public function up()
    {
        Schema::create('matieres_seniors', function (Blueprint $table) {


            $table->integer('matiere_id');
            $table->integer('senior_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('matiere_id')
                ->references('id')->on('matieres');

            $table->foreign('senior_id')
                ->references('id')->on('seniors');

        });
    }


    public function down()
    {
        //
    }
}
