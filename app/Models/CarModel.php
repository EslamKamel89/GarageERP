<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class CarModel extends Model {
    /** @use HasFactory<\Database\Factories\CarModelFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'year_range'];
    protected $casts = ['year_range' => 'array'];
    public function clients(): HasMany {
        return $this->hasMany(Client::class);
    }
}
