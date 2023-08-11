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

class CoinAgencyCoinSendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   
        $userId = Auth::user()->id;

        $data = [
            'count_user' => CoinAgencyCoinSentRequest::where('user_id', $userId)->latest()->count(),
            'title'    => 'Coin Send Transaction List'
        ];

        if($request->ajax()) 
        {
            $data = CoinAgencyCoinSentRequest::where('user_id', $userId)->select('*')
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
                        $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteModel"><i class="fi-rr-trash"></i></div>';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.coin-agency-coin-send-request.index', $data);
    }

    public function create()
    {
        $data = [
            'title'              => 'Add New Coin Send Request'
        ];

        return view('backend.coin-agency-coin-send-request.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try 
        {   
            $validator = Validator::make($request->all(), [
                'user_name'             => 'required',
                'user_id'               => 'required',
                'coin'                  => 'required'
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }

            $existPendingRequest = CoinAgencyCoinSentRequest::where('user_id', Auth::user()->id)->where('approval_status', 'Pending')->first();
            if($existPendingRequest)
            {
                $response = [
                    'status'    => false,
                    'message'   => 'You have already pending request yet! you can not send request now'
                ];

                return response()->json($response);
            }

            $totalCoin = 0;
            $walletInfo = CoinAgencyWallet::select('total_coin')->where('user_id', Auth::user()->id)->first();
            if($walletInfo)
            {
                $totalCoin = $walletInfo->total_coin;
            }

            if($request->coin > $totalCoin)
            {
                $response = [
                    'status'    => false,
                    'message'   => 'You can not cross your coin balance limit which is - '.$totalCoin
                ];

                return response()->json($response);
            }

            $model                          = new CoinAgencyCoinSentRequest();
            $model->user_id                 = Auth::user()->id;
            $model->send_user_name          = $request->user_name;
            $model->send_user_id            = $request->user_id;
            $model->coin                    = $request->coin;
            $model->approval_status         = 'Pending';
            $model->save();

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Coin Send request saved successfully!'
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
