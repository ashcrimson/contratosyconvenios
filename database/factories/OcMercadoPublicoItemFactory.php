<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OcMercadoPublicoItem;
use Faker\Generator as Faker;

$factory->define(OcMercadoPublicoItem::class, function (Faker $faker) {

    return [
        'oc_mercado_publico_id' => $this->faker->randomDigitNotNull,
        'correlativo' => $this->faker->word,
        'codigo_categoria' => $this->faker->word,
        'categoria' => $this->faker->word,
        'codigo_producto' => $this->faker->word,
        'producto' => $this->faker->word,
        'especificacion_comprador' => $this->faker->text,
        'especificacion_proveedor' => $this->faker->text,
        'cantidad' => $this->faker->randomDigitNotNull,
        'unidad' => $this->faker->randomDigitNotNull,
        'moneda' => $this->faker->word,
        'precio_neto' => $this->faker->randomDigitNotNull,
        'total_cargos' => $this->faker->randomDigitNotNull,
        'total_descuentos' => $this->faker->randomDigitNotNull,
        'total_impuestos' => $this->faker->randomDigitNotNull,
        'total' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
