<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Auth;
use App\Models\CoinAgencyCoinSentRequest;
use App\Models\CoinAgencyWallet;
use Validator;

class CoinAgencyCoinSendRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {       
        $data = [
            'count_user' => CoinAgencyCoinSentRequest::latest()->count(),
            'title'      => 'Coin Send Request List'
        ];

        if($request->ajax()) 
        {
            $data = CoinAgencyCoinSentRequest::with('approved_user', 'rejected_user')->select('*')
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
                ->addColumn('approved_by', function($row)
                {
                    return ($row->approved_by) ? $row->approved_user->email : 'N/A';
                })
                ->addColumn('rejected_by', function($row)
                {
                    return ($row->rejected_by) ? $row->rejected_user->email : 'N/A';
                })
                ->addColumn('action', function ($row) {

                    $btn = '';
                    if($row->approval_status == 'Pending')
                    {
                        $btn = '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editModel"><i class=" fi-rr-edit"></i></div>';

                        $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteModel"><i class="fi-rr-trash"></i></div>';
                    }

                    if($row->approval_status == 'Rejected')
                    {
                        $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteModel"><i class="fi-rr-trash"></i></div>';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'status', 'approved_by','rejected_by'])
                ->make(true);
        }

        return view('backend.coin-agency-coin-send-request-admin.index', $data);
    }

    public function edit($id)
    {   
        $model = CoinAgencyCoinSentRequest::find($id);
        $walletInfo = CoinAgencyWallet::select('total_coin', 'total_amount')->where('user_id', $model->user_id)->first();

        if($model->approval_status == 'Approved' || $model->approval_status == 'Rejected')
        {
            return redirect()->route('coin-agency-coin-send-request-list');
        }

        $data = [
            'title'              => 'Edit Coin Send Request',
            'model'              => $model,
            'walletInfo'         => $walletInfo
        ];

        return view('backend.coin-agency-coin-send-request-admin.edit', $data);
    }

    public function update(Request $request)
    {   
        DB::beginTransaction();

        try 
        {   
            $validator = Validator::make($request->all(), [
                'user_name'      => 'required',
                'user_id'        => 'required',
                'coin'           => 'required'
            ]);
            
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }

            $model  = CoinAgencyCoinSentRequest::find($request->model_id);

            if($model->approval_status == 'Approved' || $model->approval_status == 'Rejected')
            {
                $response = [
                    'status'    => false,
                    'message'   => 'Already '.$model->approval_status.'by admin!You can not update now!'
                ];
        
                return response()->json($response);
            }
            
            $model->send_user_name          = $request->user_name;
            $model->send_user_id            = $request->user_id;
            $model->coin                    = $request->coin;
            $model->approval_status         = $request->status;
            $model->approved_by             = ($request->status == 'Approved') ? Auth::user()->id : null;
            $model->rejected_by             = ($request->status == 'Rejected') ? Auth::user()->id : null;
            $model->update();

            if($request->status == 'Approved')
            {
                $wallet = CoinAgencyWallet::where('user_id', $model->user_id)->first();
                $wallet->total_coin = $wallet->total_coin - $request->coin;
                $wallet->update();
            }

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Coin send request updated successfully!'
            ];
    
            return response()->json($response);

        }
        catch (\Exception $e) 
        {   
            dd($e);
            DB::rollback();
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try 
        {   
            CoinAgencyCoinSentRequest::find($id)->delete();

            DB::commit();
            
            $response = [
                'status'    => true,
                'message'   => 'Coin send request deleted successfully!'
            ];

            return response()->json($response);
        }
        catch (\Exception $e) 
        {
            DB::rollback();
        }
    }
}
