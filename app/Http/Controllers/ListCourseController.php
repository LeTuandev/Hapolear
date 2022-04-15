<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Facades\DB;

class ListCourseController extends Controller
{
    public function index()
    {
        $courses = Courses::paginate(6);
        return view('listcourse', compact('courses'));
    }
}
