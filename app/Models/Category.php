<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category',
        'created_at',
        'updated_at',
    ];
    public function CategoryEvent()
    {
        return $this->hasMany(CategoryEvent::class);
    }
}
