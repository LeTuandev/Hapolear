<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function show($courseId, $lessonId)
    {
        $courses = Courses::find($courseId);
        $otherCourses = Courses::otherCourse()->get();
        $lessons = Lesson::find($lessonId);
        if (Auth::user()->checkUserLesson($lessonId) == 0) {
            $lessons->users()->attach(Auth::user()->id, ['progress' => config('filter.progress')]);
        }
        $programs = $lessons->documents()->get();
        return view('lessons.show', compact('courses', 'lessons', 'otherCourses', 'programs'));
    }
}
