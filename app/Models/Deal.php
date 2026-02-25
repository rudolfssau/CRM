<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deal extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'deal_status_id',
        'assigned_to',
        'title',
        'description',
        'value',
        'expected_close_date',
        'actual_close_date',
        'probability',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'value' => 'decimal:2',
        'expected_close_date' => 'date',
        'actual_close_date' => 'date',
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(DealStatus::class, 'deal_status_id');
    }

    /**
     * @return BelongsTo
     */
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
