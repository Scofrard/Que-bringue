<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'seats'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
