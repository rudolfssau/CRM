<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'sku',
        'name',
        'description',
        'price',
        'cost',
        'unit',
        'is_active',
        'type',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'price' => 'decimal:2',
        'cost' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * @return HasOne
     */
    public function inventory(): HasOne
    {
        return $this->hasOne(Inventory::class);
    }
}
