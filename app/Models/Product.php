<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model {
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'code',
        'name',
        'description',
        'buy_price',
        'sell_price',
        'quantity',
        'min_stock_quantity',
        'notes'
    ];

    protected $casts = [
        'buy_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
    ];

    // Relationships
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function invoiceItems(): HasMany {
        return $this->hasMany(InvoiceItem::class);
    }
}
