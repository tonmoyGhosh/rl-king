<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveHoster;
use DataTables;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class LiveHosterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {    
        $userId = Auth::user()->id;

        $data = [
            'count_user' => LiveHoster::where('user_id', $userId)->latest()->count(),
            'title'      => 'Live Hoster List'
        ];

        if($request->ajax()) 
        {
            $data = LiveHoster::where('user_id', $userId)->select('*')
                            ->orderByDesc('created_at');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row)
                {
                    if($row->approval_status == 'Approved') $status = '<span class="badge badge-success"">Approved</span>';
                    else if($row->approval_status == 'Pending') $status = '<span class="badge badge-warning"">Pending</span>';
                    else if($row->approval_status == 'Rejected') $status = '<span class="badge badge-danger"">Rejected</span>';
                    
                    return $status;
                })
                ->addColumn('action', function ($row) {

                    $btn = '';
                    if($row->approval_status == 'Pending')
                    {
                        $btn = '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editModel"><i class=" fi-rr-edit"></i></div>';

                        $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteModel"><i class="fi-rr-trash"></i></div>';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.host-agency-live-hoster.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Live Hoster'
        ];

        return view('backend.host-agency-live-hoster.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(), [
                'hoster_name'   => 'required',
                'hoster_id'     => 'required',
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
    
            $model                          = new LiveHoster();
            $model->hoster_name             = $request->hoster_name;
            $model->hoster_id               = $request->hoster_id;
            $model->user_id                 = Auth::user()->id;
            $model->save();

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Live hoster saved successfully!'
            ];
    
            return response()->json($response);

        }
        catch (\Exception $e) 
        {
            DB::rollback();
        }
    }

    public function edit($id)
    {   
        $model = LiveHoster::find($id);

        if($model->approval_status == 'Approved' || $model->approval_status == 'Rejected')
        {
            return redirect()->route('host-agency-live-hoster-list');
        }

        $data = [
            'title'              => 'Edit Live Hoster',
            'model'              => $model
        ];

        return view('backend.host-agency-live-hoster.edit', $data);
    }

    public function update(Request $request)
    {   
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(), [
                'hoster_name'   => 'required',
                'hoster_id'     => 'required',
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
    
            $model                          = LiveHoster::find($request->model_id);
            if($model->approval_status == 'Approved' || $model->approval_status == 'Rejected')
            {
                $response = [
                    'status'    => false,
                    'message'   => 'Live hoster '.$model->approval_status.' by admin. You can not update now'
                ];
        
                return response()->json($response);
            }

            $model->hoster_name             = $request->hoster_name;
            $model->hoster_id               = $request->hoster_id;
            $model->user_id                 = Auth::user()->id;
            $model->update();

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Live hoster updated successfully!'
            ];
    
            return response()->json($response);

        }
        catch (\Exception $e) 
        {
            DB::rollback();
        }
    }

    public function delete($id)
    {   
        return response()->json($id);

        DB::beginTransaction();

        try 
        {   
            LiveHoster::find($id)->delete();

            DB::commit();
            
            $response = [
                'status'    => true,
                'message'   => 'Live hoster deleted successfully!'
            ];

            return response()->json($response);
        }
        catch (\Exception $e) 
        {
            DB::rollback();
        }
    }
}