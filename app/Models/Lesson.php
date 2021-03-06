<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function courses()
    {
        return $this->belongsTo(Courses::class);
    }

    public function scopeSearch($query, $data, $id)
    {
        $query->where('course_id', $id)->orderBy('created_at', config('filter.sort.asc'));
        if (isset($data['key'])) {
            $query->where('name', 'LIKE', '%' . $data['key'] . '%');
        }
        return $query;
    }
}
