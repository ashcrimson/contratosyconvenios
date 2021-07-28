<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrdenCompra;
use Faker\Generator as Faker;

$factory->define(OrdenCompra::class, function (Faker $faker) {

    return [
        'contrato_id' => $this->faker->word,
        'numero' => $this->faker->word,
        'fecha_envio' => $this->faker->word,
        'total' => $this->faker->word,
        'codigo' => $this->faker->word,
        'cantidad' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'tiene_detalles' => $this->faker->word,
        'estado_id' => $this->faker->word,
        'user_crea' => $this->faker->word,
        'user_actualiza' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
