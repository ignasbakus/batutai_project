<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrampolineImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'trampoline_id',
        'image'
    ];
}
