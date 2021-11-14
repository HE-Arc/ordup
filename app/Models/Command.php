<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'barman_id',
        'waiter_id',
        'place_id',
        'amount',
        'is_payed',
        'day',
        'hour'
    ];
}
