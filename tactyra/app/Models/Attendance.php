<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'player_id',
        'day',
        'date',
        'present'
    ];
}