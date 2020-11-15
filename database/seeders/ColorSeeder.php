<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('color')->insert([
            [
                'content' => 'Đỏ',
            ],
            [
                'content' => 'Hồng',
            ],
            [
                'content' => 'Cam',
            ],
            [
                'content' => 'Xanh',
            ],
            [
                'content' => 'Tím',
            ],
            [
                'content' => 'Trắng',
            ],
            [
                'content' => 'Kim',
            ],
            [
                'content' => 'Xanh',
            ],
        ]);
    }
}
