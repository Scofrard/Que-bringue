<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'seats'
    ];

    public function User()
    {
        return $this->belongsTo(User::class('user_id'));
    }
    public function Event()
    {
        return $this->belongsTo(Event::class('event_id'));
    }
}
