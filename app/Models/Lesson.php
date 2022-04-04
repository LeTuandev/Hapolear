<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'name',
        'thumbnail',
        'description',
        'requirment',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lesson', 'user_id', 'lesson_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'lesson_id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
