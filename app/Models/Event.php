<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'date',
        'seats'
    ];

    public function Reservation()
    {
        return $this->hasMany(Reservation::class('event_id'));
    }
    public function Image()
    {
        return $this->hasMany(Image::class('event_id'));
    }
    public function Localisation()
    {
        return $this->hasOne(Localisation::class('event_id'));
    }
    public function CategoryEvent()
    {
        return $this->hasMany(CategoryEvent::class('event_id'));
    }
}
