<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Diagnostic;
use Faker\Generator as Faker;

$factory->define(Diagnostic::class, function (Faker $faker) {

    return [
        'descripcion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
