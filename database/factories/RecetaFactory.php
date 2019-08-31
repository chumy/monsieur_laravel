<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Receta;
use Faker\Generator as Faker;

$factory->define(Receta::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name,
        'personas' => $faker->randomDigitNotNull,
        'tiempo' => $faker->randomDigitNotNull,

    ];
});
