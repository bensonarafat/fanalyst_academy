<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'userid',
        'courseid',
        'quizid',
        'reference',
        'amount',
        'discount',
        'total',
        "type",
        'payment_method',
    ];
}
