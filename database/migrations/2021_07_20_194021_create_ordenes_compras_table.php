<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato_id')->nullable()->index('fk_ord_compras_contratos1_idx');
            $table->string('numero');
            $table->date('fecha_envio');
            $table->decimal('total', 14,0)->nullable();
            $table->string('codigo')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('descripcion')->nullable();
            $table->tinyInteger('tiene_detalles')->nullable();
            $table->unsignedBigInteger('estado_id')->index('fk_ord_compras_estados1_idx');
            $table->unsignedBigInteger('user_crea')->nullable()->index('fk_ord_compras_users1_idx');
            $table->unsignedBigInteger('user_actualiza')->nullable()->index('fk_ord_compras_users2_idx');
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
        Schema::dropIfExists('ordenes_compras');
    }
}
