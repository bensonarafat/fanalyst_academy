<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = "quiz";

    protected $fillable = [
        'topic',
        'question',
        'a',
        'b',
        'c',
        'd',
        'answer',
        'answer_option',
        'explanation',
    ];
}
