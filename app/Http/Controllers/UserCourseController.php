<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }
    public function store(Request $request)
    {
        Auth::user()->courses()->attach($request['course_id'], ['status' => 1]);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        Auth::user()->courses()->updateExistingPivot($id, ['status' => 2]);
        return redirect()->back();
    }
}
