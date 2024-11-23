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
    /*public function CategoryEvent()
    {
        return $this->hasMany(CategoryEvent::class('category_id'));
    }*/

    public function events()
    {
        return $this->belongsToMany(Event::class, 'category_event', 'category_id', 'event_id');
    }
}
