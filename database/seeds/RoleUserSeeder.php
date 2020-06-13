<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =1; $i<51; $i++)
        {
            DB::table('role_user')->insert([
                'role_id' => random_int(3,4),
                'user_id' => $i,
            ]);
        }
    }
}
