<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UsersModel::insert([
            [
                'nik' => 'MII-FAY',
                'password' => bcrypt('Indosat2020'),
                'nama' => 'Fahmi Adzan Yanuar',
                'last_login' => NULL
            ]
        ]);
    }
}
