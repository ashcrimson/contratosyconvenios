<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrdenCompraTipo;
use Faker\Generator as Faker;

$factory->define(OrdenCompraTipo::class, function (Faker $faker) {

    return [
        'codigo' => $this->faker->randomDigitNotNull,
        'abreviacion' => $this->faker->word,
        'descripcion' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
