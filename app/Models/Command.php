<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'place_id',
        'amount',
        'is_paid',
    ];

    function waiter() {
        return $this->belongsTo(User::class);
    }

    public function drinks_in_command()
    {
        return $this->hasMany(Drink_in_Command::class);
    }

    public function drinks()
    {
        return $this->hasManyThrough(Drink_in_Command::class, Drink::class);
    }
}
