<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuniorsTable extends Migration
{
    public function up()
    {
        Schema::create('juniors', function (Blueprint $table)
        {
            $table->integer('user_id')->unsigned()->unique();

            $table->enum('status', ["candidat","formation","actif","inactif","refuse"]);
            $table->integer('LimiteTempsTransport')->unisgned();
            $table->string('NoAVS');
            $table->string('BanqueNom',255);
            $table->string('BanqueBIC', 255);
            $table->string('BanqueIBAN');
            $table->integer('AdresseDeDepart')->unsigned();
            $table->integer('AdresseFacturation')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('juniors');
    }
}
