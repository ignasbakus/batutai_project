<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'order_date',
        'delivery_date',
        'trampoline',
        'rental_duration',
        'delivery_adress',
        'total_price',
        'client_id'
    ];
}
