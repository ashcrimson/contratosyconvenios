<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Licitacion;
use Faker\Generator as Faker;

$factory->define(Licitacion::class, function (Faker $faker) {

    return [
        'numero' => $this->faker->word,
        'descripcion' => $this->faker->text,
        'presupuesto' => $this->faker->word,
        'user_crea' => $this->faker->word,
        'user_actualiza' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
    ];
});
