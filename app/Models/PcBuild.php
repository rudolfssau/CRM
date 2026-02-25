<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PcBuild extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'total_price',
        'is_template',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'total_price' => 'decimal:2',
        'is_template' => 'boolean',
    ];

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(PcBuildItem::class);
    }

    /**
     * @return void
     */
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
