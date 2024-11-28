<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    protected $fillable = [
        'latitude',
        'longitude'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
