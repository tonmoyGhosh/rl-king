<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveHosterWallet extends Model
{
    use HasFactory;

    protected $table = 'host_agency_live_hoster_wallets';

    protected $fillable = [
        'user_id',
        'total_coin'
    ];
}