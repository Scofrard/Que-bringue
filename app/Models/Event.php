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

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function localisation()
    {
        return $this->hasOne(Localisation::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_event');
    }
}
