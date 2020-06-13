<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "Administrador general del sistema",
            'slug' => "administrador",
        ]);
        DB::table('roles')->insert([
            'name' => "Administrador de huancavelivery",
            'slug' => "delivery",
        ]);
        DB::table('roles')->insert([
            'name' => "Usuario repartidor",
            'slug' => "delivery",
        ]);
        DB::table('roles')->insert([
            'name' => "Usuario cliente, solicita pedidos",
            'slug' => "cliente",
        ]);
    }
}
