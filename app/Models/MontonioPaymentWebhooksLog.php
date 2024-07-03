<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontonioPaymentWebhooksLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'client_id',
        'callback_response'
    ];
}
