<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Area;
use Faker\Generator as Faker;

$factory->define(Area::class, function (Faker $faker) {

    return [
        'AREA' => $this->faker->word,
        'ID_CARGO' => $this->faker->randomDigitNotNull
    ];
});
