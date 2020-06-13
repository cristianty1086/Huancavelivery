<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'telefono' => $faker->phoneNumber,
        'estado' => random_int(0,1),
        'avatar' => $faker->image('public/storage/user',240,240, null, false),
        'latitude' => $faker->latitude(-12.065720,-12.046246),
        'longitude' => $faker->longitude(-77.092487,-76.894455),
        'remember_token' => Str::random(10),
    ];
});
