<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'coverage',
        'notes',
        'user_id',
        'status',
    ];

    protected $casts = [
        'coverage' => 'decimal:2',
        'status' => 'boolean',
    ];

    /**
     * Get the user that owns the insurance.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the services for the insurance.
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get the patients for the insurance.
     */
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * Get the title attribute for Filament.
     */
    public function getTitleAttribute(): string
    {
        return $this->name;
    }
}
