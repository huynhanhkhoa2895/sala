<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('banner')->insert([
            [
                'img' => 'b1.png',
            ],
            [
                'img' => 'b2.png',
            ],
            [
                'img' => 'b3.png',
            ],
            [
                'img' => 'b4.png',
            ],
            [
                'img' => 'b5.png',
            ],
        ]);
    }
}
