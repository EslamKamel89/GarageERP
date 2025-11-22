<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Labour extends Model {
    /** @use HasFactory<\Database\Factories\LabourFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_ar', 'name_en', 'base_fee', 'is_active'];

    protected $casts = [
        'base_fee' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
