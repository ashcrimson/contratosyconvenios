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
            $table->foreign('tipo_id', 'fk_contratos_tipos1')->references('id')->on('contratos_tipos');
            $table->foreign('licitacion_id', 'fk_contratos_licitaciones1')->references('id')->on('licitaciones');
            $table->foreign('proveedor_id', 'fk_contratos_proveedores1')->references('id')->on('proveedores');
            $table->foreign('cargo_id', 'fk_contratos_cargos1')->references('id')->on('cargos');
            $table->foreign('area_asignado', 'fk_contratos_areas1')->references('id')->on('areas');
            $table->foreign('moneda_id', 'fk_contratos_monedas1')->references('id')->on('monedas');
            $table->foreign('estado_id', 'fk_contratos_estados1')->references('id')->on('contratos_estados');
            $table->foreign('user_crea', 'fk_contratos_users1')->references('id')->on('users');
            $table->foreign('user_actualiza', 'fk_contratos_users2')->references('id')->on('users');
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
            $table->dropForeign('fk_contratos_cargos1');
            $table->dropForeign('fk_contratos_estados1');
            $table->dropForeign('fk_contratos_tipos1');
            $table->dropForeign('fk_contratos_licitaciones1');
            $table->dropForeign('fk_contratos_monedas1');
            $table->dropForeign('fk_contratos_areas1');
            $table->dropForeign('fk_contratos_proveedores1');
            $table->dropForeign('fk_contratos_users1');
            $table->dropForeign('fk_contratos_users2');
        });
    }
}
