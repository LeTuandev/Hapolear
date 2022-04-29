<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    const ROLE_USER = 0;
    const ROLE_TEACHER = 1;
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fullname',
        'avatar',
        'phone',
        'address',
        'about',
        'birth',
        'job',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'user_lessons', 'user_id', 'lesson_id')->withPivot('progress')->withTimestamps();
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class, 'user_documents', 'user_id', 'documnet_id')->withTimestamps();
    }

    public function courses()
    {
        return $this->belongsToMany(Courses::class, 'user_courses', 'user_id', 'course_id')->withPivot('status')->withTimestamps();
    }

    public function teacherCourses()
    {
        return $this->belongsToMany(Courses::class, 'teacher_course');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'reviews');
    }

    public function scopeTeacher($query)
    {
        return $query->where('role', self::ROLE_TEACHER);
    }

    public function statusCourse($data)
    {
        return $this->courses()->where('course_id', $data)->pluck('status')->first();
    }

    public function progressLesson($data)
    {
        return $this->lessons()->where('lesson_id', $data)->pluck('progress')->first();
    }

    public function checkUserLesson($data)
    {
        return $this->lessons()->where('lesson_id', $data)->count();
    }

    public function getCourseUser($data)
    {
        return $this->courses()->where('course_id', $data)->count();
    }
}
