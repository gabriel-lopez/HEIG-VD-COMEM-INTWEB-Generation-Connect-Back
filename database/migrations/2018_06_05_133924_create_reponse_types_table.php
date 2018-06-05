<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReponseTypesTable extends Migration
{
    public function up()
    {
        Schema::create('reponse_types', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('objet', 255);
            $table->text('contenu');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reponse_types');
    }
}
