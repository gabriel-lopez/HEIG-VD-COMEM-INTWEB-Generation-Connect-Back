<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('email', 254);
            $table->enum('status', ["nontraite", "traite", "resolu"]);
            $table->text('contenu');
            $table->integer("employe_id")->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employe_id')->references('id')->on('employes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
