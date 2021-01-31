<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Dusun;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 40; $i++)
        {
            Dusun::insert([
                'dusun_nama'    => $faker->unique()->city,
                'dusun_desa'    => $faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }
}
