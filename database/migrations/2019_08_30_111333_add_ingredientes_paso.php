<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIngredientesPaso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rel_ing_paso', function (Blueprint $table) {
            $table->bigInteger('paso_id')->unsigned()->nullable();
            $table->foreign('paso_id')->references('id')->on('pasos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rel_ing_paso', function (Blueprint $table) {
            $table->dropForeign(['paso_id']);
            $table->dropColumn('paso_id');
        });
    }
}
