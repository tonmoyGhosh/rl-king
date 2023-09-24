<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\CoinAgencyWallet;
use App\Models\CoinAgencyRechargeRequest;
use App\Models\CoinAgencyCoinSentRequest;
use App\Models\User;
use Auth;

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
        $user = Auth::user();
        $userRole = $user->getRoleNames()[0];

        if($userRole == 'Coin Agency')
        {       
            $data['role_name']  = $userRole;

            $userWallet = CoinAgencyWallet::where('user_id', $user->id)->first();

            $data['total_coin'] = ($userWallet) ? $userWallet->total_coin : 0;

            $data['total_coin_send'] = CoinAgencyCoinSentRequest::where('user_id', $user->id)->where('approval_status', 'Approved')->sum('coin');
        }

        if($userRole == 'Host Agency')
        {       
            $data['role_name']  = $userRole;
        }

        if($userRole == 'Admin' || $userRole == 'Super Admin')
        {   
            $data['role_name']  = $userRole;

            $data['total_coin_agency'] = User::whereHas( 'roles', function($q){
                                                    $q->whereIn('name', ['Coin Agency']);
                                                })->where('approval_status', 1)
                                                ->latest()->count();

            $data['total_host_agency'] = User::whereHas( 'roles', function($q){
                                                    $q->whereIn('name', ['Host Agency']);
                                                })->where('approval_status', 1)
                                                ->latest()->count();

            $data['total_coin_agency_amount_approved'] = (int)CoinAgencyRechargeRequest::where('approval_status', 'Approved')->sum('amount');

            $data['total_coin_approved_coin_agency'] = CoinAgencyRechargeRequest::where('approval_status', 'Approved')->sum('coin');
                        
        }

        return view('backend.dashboard', $data);
    }
}
