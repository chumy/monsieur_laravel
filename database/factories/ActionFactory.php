<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Action;
use Faker\Generator as Faker;

$factory->define(App\Action::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});

