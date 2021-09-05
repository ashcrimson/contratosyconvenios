<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContratoItem;
use Faker\Generator as Faker;

$factory->define(ContratoItem::class, function (Faker $faker) {

    return [
        'contrato_id' => $this->faker->word,
        'codigo' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'cantidad_total' => $this->faker->word,
        'precio' => $this->faker->word,
        'grupo' => $this->faker->word,
        'presentacion_prod_soli' => $this->faker->word,
        'f_f' => $this->faker->word,
        'desc_tec_prod_ofertado' => $this->faker->word,
        'u_entrega_oferente' => $this->faker->word,
        'saldo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
