<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OcMercadoPublicoTipoDespacho;
use Faker\Generator as Faker;

$factory->define(OcMercadoPublicoTipoDespacho::class, function (Faker $faker) {

    return [
        'valor' => $this->faker->randomDigitNotNull,
        'descripcion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
