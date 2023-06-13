<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmsInboundCampaignController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Sms Inbound Campaign'
        ];

        return view('backend.sms_inbound_campaign.index', $data);
    }
}
