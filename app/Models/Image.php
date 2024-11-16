<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'created_at',
        'updated_at'
    ];
    public function Event()
    {
        return $this->belongsTo(Event::class('event_id'));
    }
}
