<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        factory(App\Supplier::class, 50)->create();
        factory(App\User::class, 50)->create();
        $this->call(RoleUserSeeder::class);
        factory(App\Product::class, 50)->create();
        factory(App\Ingrediente::class, 30)->create();
        factory(App\Guarnicion::class, 20)->create();
    }
}
