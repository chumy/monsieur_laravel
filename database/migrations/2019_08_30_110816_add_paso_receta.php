<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPasoReceta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasos', function (Blueprint $table) {
            $table->bigInteger('receta_id')->unsigned();
            $table->foreign('receta_id')->references('id')->on('recetas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasos', function (Blueprint $table) {
            $table->dropForeign(['receta_id']);
            $table->dropColumn('receta_id');
        });
    }
}
