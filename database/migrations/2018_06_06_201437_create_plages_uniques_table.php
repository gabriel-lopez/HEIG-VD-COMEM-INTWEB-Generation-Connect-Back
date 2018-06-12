<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlagesUniquesTable extends Migration
{
    public function up()
    {
        Schema::create('plages_uniques', function (Blueprint $table)
        {
            $table->increments('plage_horaire_id');

            $table->date('date');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('plage_horaire_id')->references('id')->on('plages_horaires');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plages_uniques');
    }
}
