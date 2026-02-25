<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PcBuild extends Model
{
    protected $fillable = [
        'name',
        'description',
        'total_price',
        'is_template',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'is_template' => 'boolean',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(PcBuildItem::class);
    }

    // Auto-calculate total price when items change
    protected static function booted()
    {
        static::saved(function ($build) {
            $total = $build->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            if ($build->total_price != $total) {
                $build->total_price = $total;
                $build->saveQuietly();
            }
        });
    }
}
