<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OcMercadoPublicoTipoOrdenCompra;
use Faker\Generator as Faker;

$factory->define(OcMercadoPublicoTipoOrdenCompra::class, function (Faker $faker) {

    return [
        'codigo' => $this->faker->randomDigitNotNull,
        'abreviacion' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
