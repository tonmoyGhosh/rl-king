<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Validator;

class HostAgencyUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = [
            'count_user' => User::whereHas( 'roles', function($q){
                                    $q->where('name', 'Host Agency');
                                })->latest()->count(),
            'title'    => 'Host Agency User List'
        ];

        if($request->ajax()) 
        {
            $q_user = User::whereHas( 'roles', function($q){
                                $q->where('name', 'Host Agency');
                            })->select('*')
                            ->orderByDesc('created_at');

            return Datatables::of($q_user)
                ->addIndexColumn()
                ->addColumn('status', function($row)
                {
                    if($row->approval_status == 1) $status = '<span class="badge badge-success"">Active</span>';
                    else $status = '<span class="badge badge-danger"">In Active</span>';

                    return $status;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editUser"><i class=" fi-rr-edit"></i></div>';
                    // $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteUser"><i class="fi-rr-trash"></i></div>';
                    $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 PasswordChange"><i class="fa fa-key"></i></div>';

                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.host-agency-user.index', $data);
    }
}
