<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('style')->insert([
            [
                'content' => 'Thiệp cưới bao thư in tên Dâu & Rể',
                'img' => 's1.png'
            ],
            [
                'content' => 'Thiệp cưới truyền thống',
                'img' => 's2.png'
            ],
            [
                'content' => 'Thiệp cưới Công giáo',
                'img' => 's3.png'
            ],
            [
                'content' => 'Thiệp cưới gấp 3 (không bao thư)',
                'img' => 's4.png'
            ],
            [
                'content' => 'Thiệp cưới bao thư Nhung',
                'img' => 's5.png'
            ],
            [
                'content' => 'Thiệp bao thư có chữ Song Hỷ',
                'img' => 's6.png'
            ],
            [
                'content' => 'Thiệp mời',
                'img' => 's7.png'
            ],
            [
                'content' => 'Thiệp Tân Gia',
                'img' => 's8.png'
            ],
            [
                'content' => 'Bao Lì xì',
                'img' => 's9.png'
            ],
        ]);
    }
}
