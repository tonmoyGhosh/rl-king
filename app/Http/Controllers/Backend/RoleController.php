<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DataTables;
use Illuminate\Http\Request;

class RoleController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = [
            'count_user' => Role::where('name', '!=', 'Super Admin')->latest()->count(),
            'title'    => 'Role List'
        ];

        if ($request->ajax()) 
        {
            $q_user = Role::where('name', '!=', 'Super Admin')->select('id', 'name')->orderBy('id', 'ASC');
            return Datatables::of($q_user)
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.role.index', $data);
    }
}
