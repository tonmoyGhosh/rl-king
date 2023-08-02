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
}
