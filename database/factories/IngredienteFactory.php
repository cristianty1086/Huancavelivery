<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingrediente;
use Faker\Generator as Faker;

$factory->define(Ingrediente::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'product_id' => random_int(1,15),
    ];
});
