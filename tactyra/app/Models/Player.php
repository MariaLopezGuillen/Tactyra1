<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'number',
        'club',
        'category',
        'position',
        'age',
        'speed',
        'passing',
        'shooting',
        'defense',
        'physical'
    ];
    public function notes()
    {
        return $this->hasMany(\App\Models\Note::class);
    }
}
