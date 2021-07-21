<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->foreign('areas_id', 'fk_contratos_areas1')->references('id')->on('areas');
            $table->foreign('estado_id', 'fk_contratos_contratos_estados1')->references('id')->on('contratos_estados');
            $table->foreign('tipo_id', 'fk_contratos_contratos_tipos1')->references('id')->on('contratos_tipos');
            $table->foreign('licitacion_id', 'fk_contratos_licitaciones1')->references('id')->on('licitaciones');
            $table->foreign('moneda_id', 'fk_contratos_monedas1')->references('id')->on('monedas');
            $table->foreign('proveedor_id', 'fk_contratos_proveedores1')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign('fk_contratos_areas1');
            $table->dropForeign('fk_contratos_contratos_estados1');
            $table->dropForeign('fk_contratos_contratos_tipos1');
            $table->dropForeign('fk_contratos_licitaciones1');
            $table->dropForeign('fk_contratos_monedas1');
            $table->dropForeign('fk_contratos_proveedores1');
        });
    }
}
