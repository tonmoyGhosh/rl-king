<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\IvrCampaign;
use App\Models\CampaignStatus;
use App\Models\CampaignWithContact;
use App\Models\Contact;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array(
            'count_user' => DB::table('users')->count()
        );

        return view('backend.dashboard', $data);
    }

    public function history_filter()
    {

        return view('backend.dashboard_details.monthly_statistic_dashboard');
    }
    
    public function call_sms_filter()
    {

        return view('backend.dashboard_details.monthly_call_sms_dashboard');
    }

    public function particular_filter()
    {

        return view('backend.dashboard_details.monthly_particular_dashboard');
    }

    public function outbound_sent_filter()
    {

        return view('backend.dashboard_details.monthly_outbound_sent_dashboard');
    }

    public function outbound_receive_filter()
    {

        return view('backend.dashboard_details.monthly_outbound_receive_dashboard');
    }

    public function outbound_student_receive_filter()
    {

        return view('backend.dashboard_details.monthly_outbound_student_receive_dashboard');
    }

    public function inbound_sent_filter()
    {

        return view('backend.dashboard_details.monthly_inbound_sent_dashboard');
    }

    public function inbound_receive_filter()
    {

        return view('backend.dashboard_details.monthly_inbound_receive_dashboard');
    }

    public function call_receive_hourly_filter()
    {

        return view('backend.dashboard_details.monthly_call_receive_hourly_dashboard');
    }



}
