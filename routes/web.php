<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserLessonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('', HomeController::class);
Route::resource('courses', CourseController::class);
route::middleware(['auth', 'student', 'isJoined'])->group(function () {
    Route::resource('user-course', UserCourseController::class);
    Route::resource('courses.lessons', LessonController::class);
    Route::resource('user-lesson', UserLessonController::class);
});
Auth::routes();
