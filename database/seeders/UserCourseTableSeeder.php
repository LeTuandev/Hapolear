<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserCourse;

class UserCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserCourse::factory(200)->create();
    }
}
