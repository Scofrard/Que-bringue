<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'is_subscribe_newsletter'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
