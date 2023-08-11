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


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = [
            'count_user' => User::whereHas( 'roles', function($q){
                                    $q->whereIn('name', ['Admin', 'Executive', 'Support Staff']);
                                })->latest()->count(),

            'title'    => 'User List'
        ];

        if($request->ajax()) 
        {
            $q_user = User::whereHas( 'roles', function($q){
                                $q->whereIn('name', ['Admin', 'Executive', 'Support Staff']);
                            })->select('*')
                            ->orderByDesc('created_at');

            return Datatables::of($q_user)
                ->addIndexColumn()
                ->addColumn('role', function($row)
                {
                    $roleArry = $row->getRoleNames();

                    if(isset($roleArry) && count($roleArry) != 0)  $role = '<span class="badge badge-secondary">'.$row->getRoleNames()[0].'</span>';
                    else $role = 'N/A';

                    return $role;
                })
                ->addColumn('status', function($row)
                {
                    if($row->approval_status == 1) $status = '<span class="badge badge-success"">Active</span>';
                    else $status = '<span class="badge badge-danger"">In Active</span>';

                    return $status;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editUser"><i class=" fi-rr-edit"></i></div>';

                    // $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteUser"><i class="fi-rr-trash"></i></div>';

                    if($row->approval_status == 1)
                    {
                        $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 PasswordChange"><i class="fa fa-key"></i></div>';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'role', 'status'])
                ->make(true);
        }

        return view('backend.user.index', $data);
    }

    public function create()
    {
        $data = [
            'count_user' => User::latest()->count(),
            'title'      => 'Create User',
            'roles'      => Role::pluck('name')
        ];

        return view('backend.user.create', $data);
    }

    public function store(Request $request)
    {   
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(),
            [
                'name'      => 'required',
                'email'     => 'required|string|email|max:255|unique:users',
                // 'password'  => 'required',
                'role'      => 'required'

            ]);

            if($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()]);
            }

            // User Add
            $user                       = new User();
            $user->name                 = $request->name;
            $user->email                = $request->email;
            // $user->password             = Hash::make($request->password);
            $user->approval_status      = (int)$request->status;
            $user->save();

            // Assign User Role
            $user->assignRole($request->role);

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Administrative user saved successfully!'
            ];

            return response()->json($response);
        }
        catch (\Exception $e) 
        {   
            DB::rollback();

            $response = [
                'status'    => false,
                'message'   => 'Something went wrong!'
            ];
        
            return response()->json($response);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);

        $data = [
            'count_user'    => User::latest()->count(),
            'title'         => 'Edit User',
            'user'          => $user,
            'roles'         => Role::pluck('name')
        ];

        return view('backend.user.edit', $data);
    }

    public function update(Request $request, $id)
    {   
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(),
            [
                'name'      => 'required',
                'role'      => 'required'

            ]);

            if($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()]);
            }

            // User Update
            $user                       = User::find($id);
            $user->name                 = $request->name;
            $user->approval_status      = (int)$request->status;
            if((int)$request->status == 0)
            {
                $user->password         = null; 
            }
            
            $user->update();

            // Assign User Role
            $roleArry = $user->getRoleNames();
            if(isset($roleArry) && count($roleArry) != 0) $user->removeRole($user->getRoleNames()[0]);
            $user->assignRole($request->role);

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Administrative user updated successfully!'
            ];

            return response()->json($response);
        }
        catch (\Exception $e) 
        {   
            DB::rollback();

            $response = [
                'status'    => false,
                'message'   => 'Something went wrong!'
            ];
        
            return response()->json($response);
        }

    }

    public function destroy($id)
    {   
        DB::beginTransaction();

        try 
        {
            User::find($id)->delete();

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Administrative user deleted successfully!'
            ];

            return response()->json($response);
        }
        catch (\Exception $e) 
        {   
            DB::rollback();

            $response = [
                'status'    => false,
                'message'   => 'Something went wrong!'
            ];
        
            return response()->json($response);
        }
    }

    public function passwordChange($id)
    {

        $user = User::find($id);
        $data = [
            'title'         => 'Password Change',
            'user'          => $user,
        ];
        return view('backend.user.passwordChange', $data);
    }

    public function changePasswordRequest(Request $request)
    {
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(),
            [
                'password'  => 'required'

            ]);

            if($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()]);
            }

            $user            = User::find($request->userId);
            $user->password  = Hash::make($request->password);
            $user->update();

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Administrative user password changed successfully!'
            ];

            return response()->json($response);
        }
        catch (\Exception $e) 
        {   
            DB::rollback();

            $response = [
                'status'    => false,
                'message'   => 'Something went wrong!'
            ];
        
            return response()->json($response);
        }
    }
}
