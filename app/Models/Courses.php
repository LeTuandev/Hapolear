<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return $this->belongsToMany(User::class, 'user_courses', 'user_id', 'course_id')->withPivot('status')->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_courses', 'course_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'course_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'course_tags', 'tag_id', 'course_id');
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

    public function getTagsAttribute()
    {
        return $this->tags()->pluck('link', 'name');
    }

    public function getCoursePriceAttribute()
    {
        return $this->price = config('filter.course_price') ? 'free' : number_format($this->price) .'$';
    }

    public function getStatusCourseAttribute()
    {
        return $this->users()->pluck('status');
    }

    public function getLessonById($data)
    {
        return $this->lessons()->where('id', $data)->first();
    }

    public function getVote($data)
    {
        return $this->reviews()->where('votes', $data)->get()->count();
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['key'])) {
            $query->where('title', 'LIKE', '%' . $data['key'] . '%')->orWhere('description', 'LIKE', '%' . $data['key'] . '%');
        }

        if (isset($data['created_time'])) {
            $query->orderBy('created_at', $data['created_time']);
        } else {
            $query->orderBy('created_at', config('filter.sort.desc'));
        }

        if (isset($data['teacher'])) {
            $query->whereHas('teachers', function ($subquery) use ($data) {
                $subquery->where('user_id', $data['teacher']);
            });
        }

        if (isset($data['learner'])) {
            $query->withCount('users')->orderBy('users_count', $data['learner']);
        }

        if (isset($data['learn_time'])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $data['learn_time']);
        }

        if (isset($data['lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $data['lesson']);
        }

        if (isset($data['tag'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tag']);
            });
        }
        return $query;
    }

    public function scopeOtherCourse($query)
    {
         $query->inRandomOrder()->limit(config('filter.item_other_course'));
         return $query;
    }
}
