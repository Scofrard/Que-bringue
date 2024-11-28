<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    protected $table = 'category_event';

    protected $fillable = [
        'event_id',
        'category_id',
    ];
    public function Event()
    {
        return $this->belongsTo(Event::class('event_id'));
    }
    public function Category()
    {
        return $this->belongsTo(Category::class('category_id'));
    }
}
