<?php

namespace App\Models;

use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model {
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'technician_id',
        'user_id',
        'status',
        'calculated_total',
        'actual_total',
        'actual_paid_amount',
        'labor_info',
        'notes'
    ];

    protected $casts = [
        'status' => InvoiceStatus::class,
        'labor_info' => 'array',
        'calculated_total' => 'decimal:2',
        'actual_total' => 'decimal:2',
        'actual_paid_amount' => 'decimal:2',
    ];

    // Relationships
    public function client(): BelongsTo {
        return $this->belongsTo(Client::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany {
        return $this->hasMany(InvoiceItem::class);
    }
    public function technician(): BelongsTo {
        return $this->belongsTo(Technician::class);
    }
}
