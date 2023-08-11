<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

    public function approved_user()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id')->select('id', 'name', 'email');
    }

    public function rejected_user()
    {
        return $this->belongsTo(User::class, 'rejected_by', 'id')->select('id', 'name', 'email');
    }
}
