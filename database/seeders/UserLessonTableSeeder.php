<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserLesson;

class UserLessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLesson::factory(1000)->create();
    }
}
