<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotQuery extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'bot_response_id',
    ];
}
