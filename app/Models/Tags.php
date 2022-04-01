<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'name',
        'description',
        'link',
    ];

    public function courses()
    {
        return $this->belongsToMany(Courses::class, 'course_tag', 'tag_id', 'course_id');
    }
}
