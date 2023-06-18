<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'sender_id',
        'message'
    ];

    public function conversation() : BelongsTo {
        return $this->belongsTo(Conversation::class, "conversation_id");
    }

    public function user():BelongsTo {
        return $this->belongsTo(User::class, "sender_id");
    }

    protected function serializeDate($date)
    {
        return $date->format('D, M, d, H:m a');
    }
}
