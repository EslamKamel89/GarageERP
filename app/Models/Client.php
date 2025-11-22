<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Client extends Model {
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'car_model_id',
        'name',
        'mobile',
        'email',
        'address',
        'notes',
        'chassis_nu',
        'plate_nu',
        'odometer',
    ];

    // Relationships
    public function invoices(): HasMany {
        return $this->hasMany(Invoice::class);
    }
    public  function carModel(): BelongsTo {
        return $this->belongsTo(CarModel::class);
    }
}
