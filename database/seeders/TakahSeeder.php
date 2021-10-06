<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use App\Models\Takah;

class TakahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Takah::insert([
            [
                'id' => 1,
                'takah' => '/G00-G0G/',
                'tipe' => 'Head of Region Central & West Java'
            ],
            [
                'id' => 2,
                'takah' => '/G00-G0G-G0GA/',
                'tipe' => 'DH Regional Commercial Operation'
            ],
            [
                'id' => 3,
                'takah' => '/G00-G0G-G0GC/',
                'tipe' => 'Head of Sales Central Java Area'
            ],
        ]);
    }
}
