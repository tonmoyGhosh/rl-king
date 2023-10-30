<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\LiveHoster;
use App\Models\LiveHosterWallet;
use DataTables;
use Validator;
use Auth;

class LiveHosterRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {    
        $data = [
            'count_user' => LiveHoster::with('host_agency')->latest()->count(),
            'title'      => 'Live Hoster Request List'
        ];

        
        if($request->ajax()) 
        {
            $data = LiveHoster::with('host_agency')->select('*')
                            ->orderByDesc('created_at');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('host_agency_user', function($row)
                {
                    $host_agency_user = $row->host_agency->name.' - ('.$row->host_agency->code.')';
                    return $host_agency_user;
                })
                ->addColumn('status', function($row)
                {
                    if($row->approval_status == 'Approved') $status = '<span class="badge badge-success"">Approved</span>';
                    else if($row->approval_status == 'Pending') $status = '<span class="badge badge-warning"">Pending</span>';
                    else if($row->approval_status == 'Rejected') $status = '<span class="badge badge-danger"">Rejected</span>';
                    
                    return $status;
                })
                ->addColumn('action', function ($row) {

                    $btn = '';
                    
                    if($row->approval_status == 'Pending' || $row->approval_status == 'Approved')
                    {
                        $btn = '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editModel"><i class=" fi-rr-edit"></i></div>';
                    }

                    if($row->approval_status == 'Pending' || $row->approval_status == 'Rejected')
                    {
                        $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteModel"><i class="fi-rr-trash"></i></div>';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'status', 'host_agency_user'])
                ->make(true);
        }

        return view('backend.host-agency-live-hoster-request.index', $data);
    }

    public function edit($id)
    {   
        $model = LiveHoster::with('host_agency')->find($id);

        $data = [
            'title'              => 'Edit Live Hoster Request',
            'model'              => $model
        ];

        return view('backend.host-agency-live-hoster-request.edit', $data);
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
            $model->hoster_name             = $request->hoster_name;
            $model->hoster_id               = $request->hoster_id;
            $model->approval_status         = $request->status;
            $model->remarks                 = $request->remarks;
            $model->update();

            if($request->status == 'Approved' && $request->earn_coin && $request->earn_coin != 0)
            {
                $wallet = new LiveHosterWallet;
                $wallet->user_id = $model->user_id;
                $wallet->transaction_date = date('Y-m-d');
                $wallet->total_coin = $request->earn_coin;
                $wallet->save();
            }

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Live hoster request updated successfully!'
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
        DB::beginTransaction();

        try 
        {   
            LiveHoster::find($id)->delete();

            DB::commit();
            
            $response = [
                'status'    => true,
                'message'   => 'Live hoster request deleted successfully!'
            ];

            return response()->json($response);
        }
        catch (\Exception $e) 
        {
            DB::rollback();
        }
    }
}