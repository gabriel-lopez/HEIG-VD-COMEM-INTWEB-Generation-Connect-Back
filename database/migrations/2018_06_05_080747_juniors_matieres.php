<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JuniorsMatieres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juniors_matieres', function (Blueprint $table) {


            $table->integer('matiere_id');
            $table->integer('junior_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('matiere_id')
                ->references('id')->on('matieres');

            $table->foreign('junior_id')
                ->references('id')->on('juniors');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
