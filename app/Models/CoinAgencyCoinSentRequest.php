<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinAgencyCoinSentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'send_user_name',
        'send_user_id',
        'coin',
        'approval_status',
        'approved_by',
        'rejected_by'
    ];
}
