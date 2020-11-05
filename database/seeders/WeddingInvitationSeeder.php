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
                'kind' => 1,
                'code' => 'MT-1',
                'name' => 'Thiệp 1',
                'slug' => 'thiep-1',
                'price' => '19000',
                'image' => 'p1.png'
            ],
            [
                'color' => 2,
                'style' => 2,
                'kind' => 1,
                'code' => 'MT-2',
                'name' => 'Thiệp 2',
                'slug' => 'thiep-2',
                'price' => '19000',
                'image' => 'p2.png'
            ],
            [
                'color' => 1,
                'style' => 1,
                'kind' => 3,
                'code' => 'MT-3',
                'name' => 'Thiệp 3',
                'slug' => 'thiep-3',
                'price' => '19000',
                'image' => 'p3.png'
            ],
            [
                'color' => 3,
                'style' => 2,
                'kind' => 1,
                'name' => 'Thiệp 4',
                'slug' => 'thiep-4',
                'code' => 'MT-4',
                'price' => '19000',
                'image' => 'p4.png'
            ],
            [
                'color' => 1,
                'style' => 1,
                'kind' => 3,
                'name' => 'Thiệp 5',
                'slug' => 'thiep-5',
                'code' => 'MT-5',
                'price' => '19000',
                'image' => 'p5.png'
            ],
        ]);
    }
}
