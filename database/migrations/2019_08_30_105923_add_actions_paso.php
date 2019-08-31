<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActionsPaso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasos', function (Blueprint $table) {
            $table->bigInteger('action_id')->unsigned()->nullable();
            $table->foreign('action_id')->references('id')->on('actions');
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
            $table->dropForeign(['action_id']);
            $table->dropColumn('action_id');
        });
    }
}
