<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'nama'      => 'Johannes Lumbantoruan',
            'username'  => 'johannes',
            'password'  => Hash::make('johannes'),
        ]);
    }
}
