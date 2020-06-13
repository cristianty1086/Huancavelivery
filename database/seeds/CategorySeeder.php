<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('categories')->insert([
            'name' => "Bebidas",
            'descripcion' => Str::random(10),
            //'imagen' => $faker->image('public/storage/category',240,240, 'food'),
        ]);
        DB::table('categories')->insert([
            'name' => "Comida",
            'descripcion' => Str::random(10),
            //'imagen' => $faker->image('public/storage/category',240,240, 'food'),
        ]);
        DB::table('categories')->insert([
            'name' => "Farmacia",
            'descripcion' => Str::random(10),
            //'imagen' => $faker->image('public/storage/category',240,240),
        ]);
        DB::table('categories')->insert([
            'name' => "Mercado",
            'descripcion' => Str::random(10),
            //'imagen' => $faker->image('public/storage/category',240,240),
        ]);
        DB::table('categories')->insert([
            'name' => "Enviar y recoger",
            'descripcion' => Str::random(10),
            //'imagen' => $faker->image('public/storage/category',240,240),
        ]);
        DB::table('categories')->insert([
            'name' => "Regalos",
            'descripcion' => Str::random(10),
            //'imagen' => $faker->image('public/storage/category',240,240),
        ]);
    }
}
