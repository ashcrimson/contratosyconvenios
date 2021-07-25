<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contrato;
use Faker\Generator as Faker;

$factory->define(Contrato::class, function (Faker $faker) {

    return [
        'tipo_id' => $this->faker->randomDigitNotNull,
        'licitacion_id' => $this->faker->word,
        'proveedor_id' => $this->faker->randomDigitNotNull,
        'cargo_id' => $this->faker->word,
        'moneda_id' => $this->faker->randomDigitNotNull,
        'monto' => $this->faker->word,
        'estado_alerta' => $this->faker->word,
        'fecha_inicio' => $this->faker->word,
        'fecha_termino' => $this->faker->word,
        'fecha_aprobacion' => $this->faker->word,
        'fecha_alerta_vencimiento' => $this->faker->word,
        'objeto' => $this->faker->text,
        'numero_boleta_garantia' => $this->faker->word,
        'fecha_vencimiento_boleta' => $this->faker->word,
        'alerta_vencimiento_boleta' => $this->faker->word,
        'monto_boleta_garantia' => $this->faker->word,
        'id_mercado_publico' => $this->faker->word,
        'estado_id' => $this->faker->word,
        'user_crea' => $this->faker->word,
        'user_actualiza' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
