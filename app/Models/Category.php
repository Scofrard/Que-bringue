<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'category_event');
    }
}
