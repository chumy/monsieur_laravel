<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIngMedRel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
    public function up()
    {
        Schema::table('rel_ing_paso', function (Blueprint $table) {
            $table->bigInteger('medida_id')->unsigned()->nullable();
            $table->foreign('medida_id')->references('id')->on('medidas');
            $table->bigInteger('ingrediente_id')->unsigned()->nullable();
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
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
            $table->dropForeign(['medida_id', 'ingrediente_id']);
            $table->dropColumn('medida_id');
            $table->dropColumn('ingrediente_id');
        });
    }
    
}
