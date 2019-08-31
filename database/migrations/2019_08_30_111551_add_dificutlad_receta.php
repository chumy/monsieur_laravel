<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDificutladReceta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recetas', function (Blueprint $table) {
            $table->bigInteger('dificultad_id')->unsigned()->nullable();
            $table->foreign('dificultad_id')->references('id')->on('dificultad_niveles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recetas', function (Blueprint $table) {
            $table->dropForeign(['dificultad_id']);
            $table->dropColumn('dificultad_id');
        });
    }
}
