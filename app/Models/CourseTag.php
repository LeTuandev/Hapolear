<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\softDeletes;
use Illuminate\Database\Eloquent\Model;

class CourseTag extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'course_id',
        'tag_id',
    ];
}
