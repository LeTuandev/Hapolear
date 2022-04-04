<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'course_id',
        'name',
        'thumbnail',
        'description',
        'requirment',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_lesson', 'user_id', 'lesson_id');
    }

    public function document()
    {
        return $this->hasMany(Document::class, 'lesson_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Courses::class);
    }
}
