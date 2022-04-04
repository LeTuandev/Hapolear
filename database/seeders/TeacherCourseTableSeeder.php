<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeacherCourse;

class TeacherCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherCourse::factory(1000)->create();
    }
}
