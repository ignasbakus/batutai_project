<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'order_date',
        'rental_duration',
        'delivery_address_id',
        'advance_sum',
        'total_sum',
        'client_id'
    ];

    public function trampolines(): HasMany
    {
        return $this->hasMany(OrdersTrampoline::class);
    }

    /*hasOne -> client*/
    /*hasOne -> client_address*/

}
