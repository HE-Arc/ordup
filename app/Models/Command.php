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

    /**
     * Get command owner
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get drinks in command objects relation
     *
     * @return array DrinkInCommand
     */
    public function drinksInCommand()
    {
        return $this->hasMany(DrinkInCommand::class);
    }

    /**
     * Get all drinks in command
     *
     * @return array Drink
     */
    public function drinks()
    {
        return $this->belongsToMany(Drink::class, 'drink_in_commands');
    }

    /**
     * Get command's table
     *
     * @return BarTable
     */
    public function bartable()
    {
        return $this->belongsTo(BarTable::class, 'bar_table_id');
    }
}
