<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCargoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cargo_user', function (Blueprint $table) {
            $table->foreign('cargo_id', 'fk_cargos_users_cargos1')->references('id')->on('cargos');
            $table->foreign('user_id', 'fk_cargos_users_users1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cargo_user', function (Blueprint $table) {
            $table->dropForeign('fk_cargos_users_cargos1');
            $table->dropForeign('fk_cargos_users_users1');
        });
    }
}
