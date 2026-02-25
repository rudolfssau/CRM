<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryNote extends Model
{
    protected $fillable = [
        'customer_id',
        'invoice_id',
        'delivery_note_number',
        'delivery_date',
        'delivery_address',
        'status',
        'notes',
    ];

    protected $casts = [
        'delivery_date' => 'date',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    // Auto-generate delivery note number
    protected static function booted()
    {
        static::creating(function ($note) {
            if (!$note->delivery_note_number) {
                $note->delivery_note_number = 'DN-' . date('Y') . '-' . str_pad(DeliveryNote::count() + 1, 5, '0', STR_PAD_LEFT);
            }
        });
    }
}
