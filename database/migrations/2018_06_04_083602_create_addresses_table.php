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

            $table->text('ligne1');
            $table->text('ligne2');
            $table->text('ligne3');
            $table->text('ville');
            $table->text('pays');
            $table->text('npa');


            $table->timestamps();
            $table->softDeletes();


        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
