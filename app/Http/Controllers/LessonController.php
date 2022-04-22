<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function show($courseId, $lessonId)
    {
        $courses = Courses::find($courseId);
        $otherCourses = Courses::totalCourse()->get();
        $lessons = Lesson::find($lessonId);
        $programs = $lessons->documents()->get();
        return view('lessons.show', compact('courses', 'lessons', 'otherCourses', 'programs'));
    }
}
