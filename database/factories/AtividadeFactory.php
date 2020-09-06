<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atividade;
use Faker\Generator as Faker;

$factory->define(Atividade::class, function (Faker $faker) {
    return [
        'titulo' => $faker->text(20),
        'descricao' => $faker->text(100),
        'tipo' => $faker->word(),
        'data_inicio' => $faker->dateTimeBetween('-10 days', 'now'),
        'data_prazo' => $faker->dateTimeBetween('now', '+10 days'),
        'data_conclusao' => $faker->boolean() ? null : $faker->dateTimeBetween('-5 days', 'now'),
    ];
});