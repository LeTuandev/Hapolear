<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'title',
        'description',
        'avatar',
        'price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course', 'user_id', 'course_id');
    }

    public function teachers()
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
        return $this->hasMany(Lesson::class);
    }
}
