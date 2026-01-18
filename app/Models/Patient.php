<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'address',
        'identification_number',
        'insurance_id',
        'user_id',
        'notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * Get the user that owns the patient.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the insurance that the patient belongs to.
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
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the full name of the patient.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
