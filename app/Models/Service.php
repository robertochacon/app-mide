<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cost',
        'insurance_id',
        'user_id',
        'applies_insurance',
        'status',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
        'applies_insurance' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * Get the user that owns the service.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the insurance that the service belongs to.
     */
    public function insurance(): BelongsTo
    {
        return $this->belongsTo(Insurance::class);
    }

    /**
     * Get the title attribute for Filament.
     */
    public function getTitleAttribute(): string
    {
        return $this->name;
    }
}
