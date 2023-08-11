<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;

class CoinAgencyProfileController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);

        $data = [
            'title' => 'Profile Information',
            'user' => $user
        ];

        return view('backend.coin-agency-profile.profile', $data);
    }
}
