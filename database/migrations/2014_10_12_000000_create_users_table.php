<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('motdepasse');

            $table->integer('adresse_habitation_id')->unsigned();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('adresse_habitation_id')->references('id')->on('addresses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
