<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class InvoiceItem extends Model {
    /** @use HasFactory<\Database\Factories\InvoiceItemFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price'
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    // Relationships
    public function invoice(): BelongsTo {
        return $this->belongsTo(Invoice::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
