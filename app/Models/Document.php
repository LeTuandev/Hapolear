<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'name',
        'img_path',
        'type',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_documents', 'documnet_id', 'user-id')->withTimestamps();
    }

    public function getDocumnetByUserIdAttribute(Type $var = null)
    {
        return $this->users()->where('user_id', Auth::user()->id)->count();
    }
}
