<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->morphs('model');
            $table->string('seccion')->nullable();
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('user_crea')->nullable()->index('fk_bitacoras_users1_idx');
            $table->unsignedBigInteger('user_actualiza')->nullable()->index('fk_bitacoras_users2_idx');
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
        Schema::dropIfExists('bitacoras');
    }
}
