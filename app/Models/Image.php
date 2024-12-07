<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'event_id',
        'path',
        'created_at',
        'updated_at'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
