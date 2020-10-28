<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kind')->insert([
            [
                'content' => 'Thiệp Cưới',
            ],
            [
                'content' => 'Tân Gia',
            ],
            [
                'content' => 'Thôi nôi',
            ],
        ]);
    }
}
