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
                'image' => 'p1.png'
            ],
            [
                'color' => 2,
                'style' => 2,
                'kind' => 1,
                'code' => 'MT-2',
                'image' => 'p2.png'
            ],
            [
                'color' => 1,
                'style' => 1,
                'kind' => 3,
                'code' => 'MT-3',
                'image' => 'p3.png'
            ],
            [
                'color' => 3,
                'style' => 2,
                'kind' => 1,
                'code' => 'MT-4',
                'image' => 'p4.png'
            ],
            [
                'color' => 1,
                'style' => 1,
                'kind' => 3,
                'code' => 'MT-5',
                'image' => 'p5.png'
            ],
        ]);
    }
}
