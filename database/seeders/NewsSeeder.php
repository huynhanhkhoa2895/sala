<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('news')->insert([
            [
                'title' => 'Tổ chức đám cưới thế nào là hợp lý?',
                'slug' => 'n1',
                'img' => 'n1.png',
                'content' => ''
            ],
            [
                'title' => 'Những bãi biển đẹp ở Việt Nam để tổ chức đám cưới',
                'slug' => 'n2',
                'img' => 'n2.png',
                'content' => ''
            ],
            [
                'title' => 'Những điểu kiêng kỵ khi tổ chức đám cưới',
                'slug' => 'n3',
                'img' => 'n3.png',
                'content' => ''
            ],
        ]);
    }
}
