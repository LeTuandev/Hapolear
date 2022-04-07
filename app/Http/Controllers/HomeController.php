<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Reviews;
use App\Models\Lesson;
use App\Models\UserLesson;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Courses::all()->random(3);
        $reviews = Reviews::all()->random(4);
        $coursesCounts = Courses::count();
        $lessonsCounts = Lesson::count();
        $learnerCounts = UserLesson::count();
        return view('home', compact('courses', 'reviews', 'coursesCounts', 'lessonsCounts', 'learnerCounts'));
    }
}
