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
                'code' => 'red',
                'content' => 'Đỏ',
            ],
            [
                'code' => 'pink',
                'content' => 'Hồng',
            ],
            [
                'code' => 'blue',
                'content' => 'Xanh',
            ],
        ]);
    }
}
