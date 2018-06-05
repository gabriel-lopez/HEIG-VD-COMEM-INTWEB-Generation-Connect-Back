<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSujetsTable extends Migration
{

    public function up()
    {
        Schema::create('sujets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nom');
            $table->string('description');

            $table->timestamps();
            $table->softDeletes();


        });
    }


    public function down()
    {
        Schema::dropIfExists('sujets');
    }
}
