<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courses;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courses::factory(1000)->create();
    }
}
