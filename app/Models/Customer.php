<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'company_name',
        'registration_number',
        'vat_number',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'country',
        'status',
        'notes',
    ];

    /**
     * @return BelongsToMany
     */
    public function segments(): BelongsToMany
    {
        return $this->belongsToMany(CustomerSegment::class);
    }

    /**
     * @return HasMany
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }
}
