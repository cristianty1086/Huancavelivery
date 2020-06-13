<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'supplier_id' => random_int(1,50),
        'nombre' => $faker->name,
        'descripcion' => $faker->sentence,
        'price' => $faker->randomNumber(2),
        'descuento' => $faker->randomFloat(1,0,5),
        'imagen' => $faker->image('public/storage/product',512,512),
    ];
});
