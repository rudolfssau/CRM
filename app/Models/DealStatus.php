<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealStatus extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name', 'color', 'order', 'is_closed'];

    /**
     * @var string[]
     */
    protected $casts = [
        'is_closed' => 'boolean',
    ];
}
