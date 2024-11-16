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
    public function Image()
    {
        return $this->hasMany(Image::class);
    }
    public function Localisation()
    {
        return $this->hasOne(Localisation::class);
    }
    public function CategoryEvent()
    {
        return $this->hasMany(CategoryEvent::class);
    }
}
