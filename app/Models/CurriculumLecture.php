<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumLecture extends Model
{
    use HasFactory;

    protected $table = 'curriculum_lecture';

    protected $fillable = [
        'courseid',
        'curriculumid',
        'title',
        'description',
        'media_video',
        'media_type',
        'media_thumbnail',
        'lecture_type',
        'document',
    ];
}
