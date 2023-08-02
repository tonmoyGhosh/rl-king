<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Currency;

class CoinAgencyRechargeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'currency_id',
        'amount',
        'payment_type',
        'transaction_id',
        'screen_shot_file',
        'approval_status',
        'approved_by',
        'rejected_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'code');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class)->select('id', 'short_code');
    }
}
