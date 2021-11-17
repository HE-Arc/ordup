<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'drink_id',
        'command_id',
    ];

    function command() {
        return $this->belongsTo(Command::class);
    }
}
