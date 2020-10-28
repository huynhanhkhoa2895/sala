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
                'content' => 'Kiểu 1',
            ],
            [
                'content' => 'Kiểu 2',
            ],
            [
                'content' => 'Kiểu 3',
            ],
        ]);
    }
}
