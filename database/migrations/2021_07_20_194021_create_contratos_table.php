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
            $table->unsignedBigInteger('tipo_id')->index('fk_ctr_tipos1_idx');
            $table->unsignedBigInteger('licitacion_id')->nullable()->index('fk_ctr_licitaciones1_idx');
            $table->unsignedBigInteger('proveedor_id')->index('fk_ctr_proveedores1_idx');
            $table->unsignedBigInteger('moneda_id')->index('fk_ctr_monedas1_idx');
            $table->unsignedBigInteger('cargo_id')->nullable()->index('fk_ctr_cargos1_idx');
            $table->unsignedBigInteger('area_asignado')->nullable()->index('fk_ctr_areas1_idx');
            $table->decimal('monto',14,0);
            $table->boolean('tiene_detalles')->nullable();
            $table->boolean('estado_alerta')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_termino')->nullable();
            $table->date('fecha_aprobacion')->nullable();
            $table->date('fecha_alerta_vencimiento')->nullable();
            $table->text('objeto');
            $table->string('numero_boleta_garantia', 45)->nullable();
            $table->date('fecha_vencimiento_boleta')->nullable();
            $table->date('alerta_vencimiento_boleta')->nullable();
            $table->decimal('monto_boleta_garantia',14,0)->nullable();
            $table->string('id_mercado_publico')->nullable();
            $table->unsignedBigInteger('estado_id')->index('fk_ctr_estados1_idx');
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
