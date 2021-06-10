<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class newsLetterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsletters')->insert([
            'email' => "hesoub1@gmail.com",
            'created_at' =>'2018-12-05 05:08:00'
        ]);
        DB::table('newsletters')->insert([
            'email' => "hesoub2@gmail.com",
            'created_at' =>'2018-12-05 05:08:00'
        ]);
        DB::table('newsletters')->insert([
            'email' => "hesoub3@gmail.com",
            'created_at' =>'2018-12-05 05:08:00'
        ]);
        DB::table('newsletters')->insert([
            'email' => "hesoub4@gmail.com",
            'created_at' =>'2018-12-05 05:08:00'
        ]);
        DB::table('newsletters')->insert([
            'email' => "hesoub5@gmail.com",
            'created_at' =>'2018-12-05 05:08:00'
        ]);

   
    }
}
