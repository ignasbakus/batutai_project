<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'clients_id',
        'address_street',
        'address_town',
        'address_postcode',
        'address_country'
    ];

}
