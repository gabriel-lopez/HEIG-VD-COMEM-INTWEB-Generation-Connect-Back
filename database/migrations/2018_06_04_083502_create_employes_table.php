<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    public function up()
    {
        Schema::create('employes', function (Blueprint $table)
        {
            $table->increments('id');

            $table->enum('status', ["actif", "inactif"]);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
