<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'name',
        'description',
        'date',
        'seats',
    ];

    public function Reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
