<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LiveHoster extends Model
{
    use HasFactory;

    protected $table = 'host_agency_live_hosters';

    protected $fillable = [
        'user_id',
        'hoster_name',
        'hoster_id',
        'remarks',
        'approval_status'
    ];

    public function host_agency()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}