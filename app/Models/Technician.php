<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Technician extends Model {
    /** @use HasFactory<\Database\Factories\TechinicanFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "mobile",
        "notes",
        "active",
    ];
    protected function casts(): array {
        return [
            'active' => 'boolean',
        ];
    }
    public function invoices(): HasMany {
        return $this->hasMany(Invoice::class);
    }
}
