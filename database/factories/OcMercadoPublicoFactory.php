<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OcMercadoPublico;
use Faker\Generator as Faker;

$factory->define(OcMercadoPublico::class, function (Faker $faker) {

    return [
        'codigo' => $this->faker->word,
        'nombre' => $this->faker->word,
        'codigo_estado' => $this->faker->word,
        'codigo_licitacion' => $this->faker->word,
        'descripcion' => $this->faker->text,
        'codigo_tipo' => $this->faker->randomDigitNotNull,
        'tipo_moneda' => $this->faker->randomDigitNotNull,
        'codigo_estado_proveedor' => $this->faker->randomDigitNotNull,
        'promedio_calificacion' => $this->faker->randomDigitNotNull,
        'cantidad_evaluacion' => $this->faker->randomDigitNotNull,
        'descuentos' => $this->faker->randomDigitNotNull,
        'cargos' => $this->faker->randomDigitNotNull,
        'total_neto' => $this->faker->randomDigitNotNull,
        'porcentaje_iva' => $this->faker->randomDigitNotNull,
        'impuestos' => $this->faker->randomDigitNotNull,
        'total' => $this->faker->randomDigitNotNull,
        'financiamiento' => $this->faker->randomDigitNotNull,
        'pais' => $this->faker->word,
        'tipo_despacho' => $this->faker->randomDigitNotNull,
        'forma_pago' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
