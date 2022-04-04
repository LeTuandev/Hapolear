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
        $this->call(CoursesTableSeeder::class);
        $this->call(CourseTagTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TeacherCourseTableSeeder::class);
        $this->call(UserCourseTableSeeder::class);
        $this->call(UserLessonTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
