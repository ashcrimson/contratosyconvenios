<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrdenesComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes_compras', function (Blueprint $table) {
            $table->foreign('contrato_id', 'fk_ordenes_compras_contratos1')->references('id')->on('contratos');
            $table->foreign('estado_id', 'fk_ordenes_compras_estados1')->references('id')->on('ordenes_compras_estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenes_compras', function (Blueprint $table) {
            $table->dropForeign('fk_ordenes_compras_contratos1');
            $table->dropForeign('fk_ordenes_compras_estados1');
        });
    }
}
