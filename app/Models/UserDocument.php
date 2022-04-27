<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class UserDocument extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'user_id',
        'document',
    ];
}