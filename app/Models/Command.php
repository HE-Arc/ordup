<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'waiter_id',
        'place_id',
        'amount',
        'is_payed',
    ];

    function waiter() {
        return $this->belongsTo(User::class);
    }

    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }

    public function drinks()
    {
        return $this->hasManyThrough(Sheet::class, Drink::class);
    }
}
