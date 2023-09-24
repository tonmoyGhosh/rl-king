<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;

class HostAgencyProfileController extends Controller
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

        return view('backend.host-agency-profile.profile', $data);
    }
}