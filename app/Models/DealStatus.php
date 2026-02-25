<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealStatus extends Model
{
    protected $fillable = ['name', 'color', 'order', 'is_closed'];

    protected $casts = [
        'is_closed' => 'boolean',
    ];
}
