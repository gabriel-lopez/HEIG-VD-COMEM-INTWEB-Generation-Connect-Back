<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('ligne1', 255);
            $table->string('ligne2', 255);
            $table->string('ligne3', 255);
            $table->string('ville', 255);
            $table->string('pays', 255);
            $table->integer('npa')->unsigned();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
