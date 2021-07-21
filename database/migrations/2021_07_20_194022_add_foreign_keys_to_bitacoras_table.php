<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bitacoras', function (Blueprint $table) {
            $table->foreign('user_crea', 'fk_bitacoras_users1')->references('id')->on('users');
            $table->foreign('user_actualiza', 'fk_bitacoras_users2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bitacoras', function (Blueprint $table) {
            $table->dropForeign('fk_bitacoras_users1');
            $table->dropForeign('fk_bitacoras_users2');
        });
    }
}
