<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'trampolines_id',
        'color',
        'height',
        'width',
        'length',
        'rental_duration',
        'rental_duration_type',
        'activity',
        'price'
    ];
}
