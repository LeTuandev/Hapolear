<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'avatar',
        'price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'user_id', 'course_id');
    }

    public function courses()
    {
        return $this->belongsToMany(User::class, 'teacher_course');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'course_tag', 'tag_id', 'course_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function getLearnerAttribute()
    {
        return $this->users()->count();
    }

    public function getLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTimeAttribute()
    {
        return $this->lessons()->sum('time');
    }
}
