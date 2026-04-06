<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'player_id',
        'content'
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}