<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'instructor',
        'category',
        'will_learn',
        'prerequisites',
        'is_free',
        'require_enroll',
        'require_login',
        'amount',
        'discount',
        'media_video',
        'media_type',
        'media_thumbnail',
    ];
}
