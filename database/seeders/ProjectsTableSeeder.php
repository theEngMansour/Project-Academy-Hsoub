<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => "Robots",
            'slug' => "robots2",
            'desc' => "64 Robots is a team of Laravel experts brought together by a desire to create cutting edge web products. Whether building something new or refactoring a product in need of help, we'll give you a personal and thoughtful approach to development. We believe in partnering for the long haul to bring your vision to life and support it as it grows.",
            'image_path' => "64robots.png",
            'category_id' => 1,
            'user_id' => 1,
            'created_at' =>'2018-12-05 05:08:00'
        ]);

        DB::table('projects')->insert([
            'name' => "Vehikl",
            'slug' => "vehikl1",
            'desc' => "Vehikl is a team of code-crushing Laravel experts. Over the years we have built a variety of web applications for customers using Laravel as our framework of choice and implemented Lean Agile development techniques to build professional applications that are functional and easy to use.",
            'image_path' => "aboutyou.png",
            'category_id' => 1,
            'user_id' => 1,
            'created_at' =>'2018-12-05 05:08:00'
        ]);

        DB::table('projects')->insert([
            'name' => "Kirschbaum",
            'slug' => "kirschbaum2",
            'desc' => "We are a team of carefully curated Laravel experts with a history of delivering practical and efficient solutions to complex problems. We bring products and services to market quickly by leveraging iterative processes and lean development techniques.",
            'image_path' => "worksome.png",
            'category_id' => 1,
            'user_id' => 1,
            'created_at' =>'2018-12-05 05:08:00'
        ]);
        
        DB::table('projects')->insert([
            'name' => "Kirschbaum",
            'slug' => "kirschbaum1",
            'desc' => "We are a team of carefully curated Laravel experts with a history of delivering practical and efficient solutions to complex problems. We bring products and services to market quickly by leveraging iterative processes and lean development techniques.",
            'image_path' => "cyber-duck.jpg",
            'category_id' => 1,
            'user_id' => 1,
            'created_at' =>'2018-12-05 05:08:00'
        ]);
  
        DB::table('projects')->insert([
            'name' => "Byte 5",
            'slug' => "byte52",
            'desc' => "byte5 is a web technology company based in Frankfurt, Germany. For over 10 years we have been specializing on innovative open source technologies that give our expert team all the opportunities to create great web applications, sites and shops for our international clients.",
            'image_path' => "jump24.jpg",
            'category_id' => 2,
            'user_id' => 1,
            'created_at' =>'2018-12-05 05:08:00'
        ]);

        DB::table('projects')->insert([
            'name' => "DevSquad",
            'slug' => "devSquad1",
            'desc' => "You can think of DevSquad as the Navy SEALs of software development. Our team members have unique and diverse skills, and this cross-functionality lets us successfully complete any mission.",
            'image_path' => "new-ideil.png",
            'category_id' => 2,
            'user_id' => 1,
            'created_at' =>'2018-12-05 05:08:00'
        ]);

        DB::table('projects')->insert([
            'name' => "Tighten",
            'slug' => "tighten2",
            'desc' => "Tighten is a team of Laravel community leaders, web development industry veterans, and multi-disciplinary creators. We’ve built, rescued, refactored, and supported a huge number of Laravel applications since Laravel’s earliest days. Whatever your challenge, we have the experience and knowledge to help.",
            'image_path' => "romega.jpg",
            'category_id' => 2,
            'user_id' => 1,
            'created_at' =>'2018-12-05 05:08:00'
        ]);

        DB::table('projects')->insert([
            'name' => "Curotec",
            'slug' => "curotec1",
            'desc' => "Curotec is a team of Laravel architects and senior engineers with extensive experience in web, e-commerce, integrations, and application development. Curotec Laravel engineers are positioned to partner with you to create beautiful, functional, and purpose-built applications.",
            'image_path' => "tighten.jpg",
            'category_id' => 2,
            'user_id' => 1,
            'created_at' =>'2018-12-05 05:08:00'
        ]);
  
    }
}
