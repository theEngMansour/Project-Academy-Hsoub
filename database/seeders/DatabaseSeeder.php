<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Newsletter::factory(10)->create();
        $this->call(
        [
            CategoriesTableSeeder::class,
            ProjectsTableSeeder::class,
        ]); 
    }
}
