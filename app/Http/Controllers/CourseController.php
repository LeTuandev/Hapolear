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

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::teacher()->get();
        $tag = Tags::all();
        $courses = Courses::search($request->all())->paginate(config('filter.item_page'));
        return view('courses.index', compact('courses', 'request', 'teachers', 'tag'));
    }
}
