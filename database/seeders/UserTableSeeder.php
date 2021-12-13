<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
                'nm_user'    =>  $faker->name(),
                'password'    =>  bcrypt("password"),
                'email'     =>  $faker->email(),
                'level_user' =>  $faker->randomElement(['ketua','notulis','admin']),
            ]);
        }
    }
}
