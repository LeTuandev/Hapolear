<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Courses;
use App\Models\User;
use App\Models\Tags;
use App\Models\Lesson;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::teacher()->get();
        $tag = Tags::all();
        $courses = Courses::search($request->all())->paginate(config('filter.item_page'));
        return view('courses.index', compact('courses', 'request', 'teachers', 'tag'));
    }

    public function show(Request $request, $id)
    {
        $courses = Courses::find($id);
        $otherCourses = Courses::all()->random(config('filter.item_other_course'));
        $lessons = Lesson::lessonofcourse($request->all(), $id)->paginate(config('filter.item_lesson'));
        $teachers = $courses->teachers()->get();
        return view('courses.show', compact('courses', 'lessons', 'request', 'otherCourses', 'teachers'));
    }
}
