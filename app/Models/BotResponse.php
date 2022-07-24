<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'tag',
    ];

    public function queries() {
        return $this->hasMany(BotQuery::class);
    }
}
