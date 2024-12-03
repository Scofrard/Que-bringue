<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    protected $table = 'localisation';
    protected $fillable = [
        'full_address',
        'latitude',
        'longitude'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
