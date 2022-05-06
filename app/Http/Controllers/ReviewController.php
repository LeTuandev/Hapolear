<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'course_id' => $request['course_id'],
            'comment' => $request['about'],
            'votes' => $request['rating'],
        ];
        Reviews::create($data);
        return redirect()->back();
    }
}
