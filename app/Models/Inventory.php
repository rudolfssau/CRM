<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    /**
     * @var string
     */
    protected $table = 'inventory';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'quantity',
        'reserved',
        'min_stock',
        'location',
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return int
     *
     * Available quantity (not reserved)
     */
    public function getAvailableAttribute(): int
    {
        return $this->quantity - $this->reserved;
    }

    /**
     * @return bool
     *
     * Check if stock is low
     */
    public function isLowStock(): bool
    {
        return $this->quantity <= $this->min_stock;
    }
}
