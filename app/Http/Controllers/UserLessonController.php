<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLessonController extends Controller
{
    public function update(Request $request, $id)
    {
        $lessons = Lesson::find($id);
        $data = [
            'progress' => $lessons->learningProgress,
            'program_lesson' => $request['program_lesson'],
            'sumDocument' => $lessons->documents()->count(),
        ];
        $progress = UserLesson::sumProgress($data);
        Auth::user()->lessons()->updateExistingPivot($id, ['progress' => $progress]);
        Auth::user()->documents()->attach($request['documnet_id']);
        return redirect(url()->previous());
    }
}
