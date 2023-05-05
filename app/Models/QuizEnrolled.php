<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizEnrolled extends Model
{
    use HasFactory;

    protected $table = "quiz_enrolled";

    protected $fillable = [
        'userid',
        'questionid',
    ];
}
