<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class WeddingInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('wedding_invitation')->insert([
            [
                'color' => 2,
                'style' => 1,
                'name' => 'Thiệp 1',
                'slug' => 'thiep-1',
                'price' => '19000',
                'image' => 'p1.jpg'
            ],
            [
                'color' => 2,
                'style' => 2,
                'name' => 'Thiệp 2',
                'slug' => 'thiep-2',
                'price' => '19000',
                'image' => 'p2.jpg'
            ],
            [
                'color' => 1,
                'style' => 1,
                'name' => 'Thiệp 3',
                'slug' => 'thiep-3',
                'price' => '19000',
                'image' => 'p3.jpg'
            ],
            [
                'color' => 3,
                'style' => 2,
                'name' => 'Thiệp 4',
                'slug' => 'thiep-4',
                'price' => '19000',
                'image' => 'p4.jpg'
            ],
            [
                'color' => 1,
                'style' => 1,
                'name' => 'Thiệp 5',
                'slug' => 'thiep-5',
                'price' => '19000',
                'image' => 'p5.jpg'
            ],
            [
                'color' => 2,
                'style' => 3,
                'name' => 'Thiệp 6',
                'slug' => 'thiep-6',
                'price' => '19000',
                'image' => 'p6.jpg'
            ],
            [
                'color' => 2,
                'style' => 4,
                'name' => 'Thiệp 7',
                'slug' => 'thiep-7',
                'price' => '19000',
                'image' => 'p7.jpg'
            ],
            [
                'color' => 2,
                'style' => 5,
                'name' => 'Thiệp 8',
                'slug' => 'thiep-8',
                'price' => '19000',
                'image' => 'p8.jpg'
            ],
            [
                'color' => 1,
                'style' => 2,
                'name' => 'Thiệp 9',
                'slug' => 'thiep-9',
                'price' => '19000',
                'image' => 'p9.jpg'
            ],
            [
                'color' => 3,
                'style' => 3,
                'name' => 'Thiệp 10',
                'slug' => 'thiep-10',
                'price' => '19000',
                'image' => 'p10.jpg'
            ],
            [
                'color' => 2,
                'style' => 3,
                'name' => 'Thiệp 11',
                'slug' => 'thiep-11',
                'price' => '19000',
                'image' => 'p11.jpg'
            ],
            [
                'color' => 2,
                'style' => 4,
                'name' => 'Thiệp 12',
                'slug' => 'thiep-12',
                'price' => '19000',
                'image' => 'p12.jpg'
            ],
            [
                'color' => 2,
                'style' => 5,
                'name' => 'Thiệp 13',
                'slug' => 'thiep-13',
                'price' => '19000',
                'image' => 'p13.jpg'
            ],
            [
                'color' => 1,
                'style' => 2,
                'name' => 'Thiệp 14',
                'slug' => 'thiep-14',
                'price' => '19000',
                'image' => 'p14.jpg'
            ],
            [
                'color' => 3,
                'style' => 3,
                'name' => 'Thiệp 15',
                'slug' => 'thiep-15',
                'price' => '19000',
                'image' => 'p15.jpg'
            ],
        ]);
    }
}
