<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guarnicion;
use Faker\Generator as Faker;

$factory->define(Guarnicion::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'supplier_id' => random_int(1,50),
    ];
});
