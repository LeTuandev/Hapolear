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
use App\Models\Reviews;

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
        $otherCourses = Courses::otherCourse()->get();
        $lessons = $courses->lessons()->search($request->all(), $id)->paginate(config('filter.item_lesson'));
        $teachers = $courses->teachers()->get();
        $reviewCounts = $courses->reviews()->get()->count();
        $reviewAvg = $courses->getAvgVoteAttribute();
        $reviews = $courses->reviews()->get();
        $voteCountOne = $courses->getVote(1);
        $voteCountTwo = $courses->getVote(2);
        $voteCountThree = $courses->getVote(3);
        $voteCountFour = $courses->getVote(4);
        $voteCountFive = $courses->getVote(5);
        $voteOne = ($courses->getVote(1) / $courses->reviews()->pluck('votes')->count()) * 100;
        $voteTwo = ($courses->getVote(2) / $courses->reviews()->pluck('votes')->count()) * 100;
        $voteThree = ($courses->getVote(3) / $courses->reviews()->pluck('votes')->count()) * 100;
        $voteFour = ($courses->getVote(4) / $courses->reviews()->pluck('votes')->count()) * 100;
        $voteFive = ($courses->getVote(5) / $courses->reviews()->pluck('votes')->count()) * 100;
        return view('courses.show', compact('courses', 'lessons', 'request', 'otherCourses', 'teachers', 'reviewCounts', 'reviews', 'voteOne', 'voteTwo', 'voteThree', 'voteFour', 'voteFive', 'voteCountOne', 'voteCountTwo', 'voteCountThree', 'voteCountFour', 'voteCountFive', 'reviewAvg'));
    }
}
