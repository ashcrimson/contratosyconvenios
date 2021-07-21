<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Proveedor;
use Faker\Generator as Faker;

$factory->define(Proveedor::class, function (Faker $faker) {

    return [
        'rut' => $this->faker->word,
        'razon_social' => $this->faker->word,
        'nombre_fantasia' => $this->faker->word,
        'telefono' => $this->faker->word,
        'email' => $this->faker->word,
        'comuna' => $this->faker->word,
        'direccion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
