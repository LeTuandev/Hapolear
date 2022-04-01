<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'lesson_id',
        'name',
        'img_path',
        'type',
    ];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
