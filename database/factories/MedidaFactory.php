<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medida;
use Faker\Generator as Faker;

$factory->define(App\Medida::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'abr' => $faker->name,
    ];
});