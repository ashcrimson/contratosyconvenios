<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToContratosItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos_items', function (Blueprint $table) {
            $table->foreign('contrato_id', 'fk_contratos_items_contratos1')->references('id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos_items', function (Blueprint $table) {
            $table->dropForeign('fk_contratos_items_contratos1');
        });
    }
}
