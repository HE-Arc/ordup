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

    /**
     * Get command
     *
     * @return Command
     */
    function command() {
        return $this->belongsTo(Command::class);
    }

    /**
     * Get drink
     *
     * @return Drink
     */
    function drink() {
        return $this->belongsTo(Drink::class);
    }
}
