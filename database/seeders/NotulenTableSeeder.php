<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotulenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,30) as $index) {
            DB::table('notulens')->insert([
                'notulis_id'    =>  User::all()->random()->id,
                'tanggal'   =>  Carbon::parse(now())->format('Y.m.d H:i:s'),
                'tempat'    =>  $faker->name,
                'hari'    =>  $faker->name,
                'peserta' => $faker->text(),
                'materi_rapat'    =>  $faker->text(),
                'risalah_rapat'  =>  $faker->text(),
            ]);
        }
    }
}
