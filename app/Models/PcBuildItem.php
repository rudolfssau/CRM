<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PcBuildItem extends Model
{
    protected $fillable = [
        'pc_build_id',
        'product_id',
        'quantity',
        'price',
        'component_type',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function pcBuild(): BelongsTo
    {
        return $this->belongsTo(PcBuild::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Update parent build total when item is saved/deleted
    protected static function booted()
    {
        static::saved(function ($item) {
            $item->pcBuild->touch();
        });

        static::deleted(function ($item) {
            $item->pcBuild->touch();
        });
    }
}
