<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'user1_id',
        'user2_id',
        'last_message_id'
    ];

    public function lastMessage() : BelongsTo {
        return $this->belongsTo(Message::class, "last_message_id");
    }

    protected function serializeDate($date)
    {
        return $date->format('D, M, d, H:m a');
    }

}
