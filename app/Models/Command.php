<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bar_table_id',
        'amount',
        'is_paid',
    ];

    function waiter() {
        return $this->belongsTo(User::class);
    }

    public function drinks_in_command()
    {
        return $this->hasMany(DrinkInCommand::class);
    }

    public function drinks()
    {
        return $this->hasManyThrough(DrinkInCommand::class, Drink::class);
    }
}
