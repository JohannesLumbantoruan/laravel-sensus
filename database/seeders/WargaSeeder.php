<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++)
        {
            Warga::insert([
                'warga_nama'    => $faker->name(),
                'warga_ktp'     => $faker->numerify('############'),
                'warga_jk'      => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'warga_desa'    => $faker->numberBetween($min = 1, $max = 10),
                'warga_dusun'   => $faker->numberBetween($min = 1, $max = 40),
                'warga_rt'      => $faker->numberBetween($min = 1, $max = 9),
                'warga_rw'      => $faker->numberBetween($min = 1, $max = 9),
                'warga_status'  => $faker->randomElement(['Belum Kawin', 'Kawin']),
                'warga_pendidikan'  => $faker->randomElement(['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']),
                'warga_agama'   => $faker->randomElement(['Islam', 'Kristen', 'Katholik', 'Hindu', 'Buddha', 'Kong Hu Cu']),
            ]);
        }
    }
}
