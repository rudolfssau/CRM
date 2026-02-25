<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'contract_number',
        'title',
        'description',
        'start_date',
        'end_date',
        'value',
        'status',
        'document_path',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'value' => 'decimal:2',
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return void
     *
     * Auto-generate contract number
     */
    protected static function booted()
    {
        static::creating(function ($contract) {
            if (!$contract->contract_number) {
                $contract->contract_number = 'CNT-' . date('Y') . '-' . str_pad(Contract::count() + 1, 5, '0', STR_PAD_LEFT);
            }
        });
    }

    /**
     * @return bool
     *
     * Check if contract is expiring soon (within 30 days)
     */
    public function isExpiringSoon(): bool
    {
        return $this->end_date->diffInDays(now()) <= 30 && $this->end_date->isFuture();
    }
}
