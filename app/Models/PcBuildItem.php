<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PcBuildItem extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'pc_build_id',
        'product_id',
        'quantity',
        'price',
        'component_type',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * @return BelongsTo
     */
    public function pcBuild(): BelongsTo
    {
        return $this->belongsTo(PcBuild::class);
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return void
     *
     * Update parent build total when item is saved/deleted
     */
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
