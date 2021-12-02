<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkInCommand extends Model
{
    use HasFactory;

    protected $fillable = [
        'drink_id',
        'command_id',
        'quantity'
    ];

    function command() {
        return $this->belongsTo(Command::class);
    }

    function drink() {
        return $this->belongsTo(Drink::class);
    }
}
