<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinAgencyWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount',
        'total_coin'
    ];
}
