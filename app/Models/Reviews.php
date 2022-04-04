<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'rate_star',
        'vote',
        'comment',
        'user_id',
        'course_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Courses::class);
    }
}
