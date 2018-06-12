<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichierUserTable extends Migration
{
    public function up()
    {
        Schema::create('fichier_user', function (Blueprint $table)
        {
            $table->integer('fichier_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('fichier_id')->references('id')->on('fichiers');
            $table->foreign('user_id')->references('id')->on('users');

            $table->primary(['fichier_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('fichier_user');
    }
}
