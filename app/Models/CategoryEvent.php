<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    public function Event()
    {
        return $this->belongsTo(Event::class('event_id'));
    }
    public function Category()
    {
        return $this->belongsTo(Category::class('category_id'));
    }
}
