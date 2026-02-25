<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'first_name',
        'last_name',
        'position',
        'email',
        'phone',
        'mobile',
        'is_primary',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'is_primary' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
