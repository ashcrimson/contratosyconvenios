<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_id')->index('fk_contratos_contratos_tipos1_idx');
            $table->integer('moneda_id')->index('fk_contratos_monedas1_idx');
            $table->integer('proveedor_id')->index('fk_contratos_proveedores1_idx');
            $table->unsignedBigInteger('licitacion_id')->nullable()->index('fk_contratos_licitaciones1_idx');
            $table->string('monto', 45);
            $table->date('fecha_alerta');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->date('fecha_aprobacion');
            $table->date('fecha_alerta_vencimiento');
            $table->text('objeto');
            $table->string('numero_boleta_garantia', 45);
            $table->date('fecha_vencimiento_boleta');
            $table->date('alerta_vencimiento_boleta');
            $table->unsignedBigInteger('estado_id')->index('fk_contratos_contratos_estados1_idx');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('areas_id')->index('fk_contratos_areas1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
