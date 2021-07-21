<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Moneda;
use Faker\Generator as Faker;

$factory->define(Moneda::class, function (Faker $faker) {

    return [
        'nombre' => $this->faker->word,
        'codigo' => $this->faker->word,
        'equivalencia' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
