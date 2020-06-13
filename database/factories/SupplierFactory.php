<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1,6),
        'name' => $faker->name,
        'estado' => random_int(0,1),
        'ruc' => Str::random(11),
        'logo' => $faker->image('public/storage/supplier',340,150, null, false),
        'descripcion' => $faker->sentence,
        'direccion' => $faker->streetName,
        'latitude' => $faker->latitude(-12.065720,-12.046246),
        'longitude' => $faker->longitude(-77.092487,-76.894455),
    ];
});
