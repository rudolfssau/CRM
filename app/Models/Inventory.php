<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    protected $table = 'inventory';

    protected $fillable = [
        'product_id',
        'quantity',
        'reserved',
        'min_stock',
        'location',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Available quantity (not reserved)
    public function getAvailableAttribute(): int
    {
        return $this->quantity - $this->reserved;
    }

    // Check if stock is low
    public function isLowStock(): bool
    {
        return $this->quantity <= $this->min_stock;
    }
}
