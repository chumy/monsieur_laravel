<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChecksPaso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasos', function (Blueprint $table) {
            //
            $table->boolean('atras')->default(0);
            $table->boolean('mariposa')->default(0);
            $table->boolean('cestillo')->default(0);
            $table->boolean('cubilete')->default(0);
            $table->integer('comando_id')->unsigned()->nullable();

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
            //
            $table->dropColumn('atras');
            $table->dropColumn('mariposa');
            $table->dropColumn('cestillo');
            $table->dropColumn('cubilete');
            $table->dropColumn('comando_id');
        });
    }
}
