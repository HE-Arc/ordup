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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drinks_in_command()
    {
        return $this->hasMany(DrinkInCommand::class);
    }

    public function drinks()
    {
        return $this->belongsToMany(Drink::class, 'drink_in_commands');
    }

    public function bartable()
    {
        return $this->belongsTo(BarTable::class, 'bar_table_id');
    }
}
