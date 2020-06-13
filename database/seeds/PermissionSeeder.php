<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission')->insert([
            'name' => "Crear y editar roles",
            'slug' => "ce-roles",
        ]);
        DB::table('permission')->insert([
            'name' => "Crear y editar categorias",
            'slug' => "ce-categorias",
        ]);
        DB::table('permission')->insert([
            'name' => "Crear repartidores",
            'slug' => "ce-repartidores",
        ]);
        DB::table('permission')->insert([
            'name' => "Crear y editar pedidos",
            'slug' => "ce-editar-pedidos",
        ]);
        DB::table('permission')->insert([
            'name' => "Crear y editar tiendas",
            'slug' => "ce-tiendas",
        ]);
        DB::table('permission')->insert([
            'name' => "Crear y editar configuraciones",
            'slug' => "ce-configuracion",
        ]);
        DB::table('permission')->insert([
            'name' => "Ver toda la informacion",
            'slug' => "ver-info",
        ]);
    }
}
