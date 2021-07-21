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
            $table->integer('tipo_id')->index('fk_ctr_tipos1_idx');
            $table->integer('moneda_id')->index('fk_ctr_monedas1_idx');
            $table->integer('proveedor_id')->index('fk_ctr_proveedores1_idx');
            $table->unsignedBigInteger('licitacion_id')->nullable()->index('fk_ctr_licitaciones1_idx');
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
            $table->unsignedBigInteger('estado_id')->index('fk_ctr_estados1_idx');
            $table->unsignedBigInteger('area_id')->index('fk_ctr_areas1_idx');
            $table->unsignedBigInteger('user_crea')->index('fk_contratos_users1_idx');
            $table->unsignedBigInteger('user_actualiza')->nullable()->index('fk_contratos_users2_idx');
            $table->timestamps();
            $table->softDeletes();
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
