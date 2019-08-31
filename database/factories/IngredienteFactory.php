<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingrediente;
use Faker\Generator as Faker;

$factory->define(Ingrediente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});

