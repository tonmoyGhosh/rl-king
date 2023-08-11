<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Auth;
use App\Models\CoinAgencyRechargeRequest;
use App\Models\CoinAgencyWallet;
use App\Models\Currency;
use Validator;

class CoinAgencyRechargeRequestController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   
        $userId = Auth::user()->id;

        $data = [
            'count_user' => CoinAgencyRechargeRequest::latest()->count(),
            'title'    => 'Recharge Request List'
        ];

        if($request->ajax()) 
        {
            $data = CoinAgencyRechargeRequest::with('currency', 'user')->select('*')
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
                ->addColumn('user', function($row)
                {
                    return $row->user->name.' - ('.$row->user->code.')';
                })
                ->addColumn('currency', function($row)
                {
                    return $row->currency->short_code;
                })
                ->addColumn('coin', function($row)
                {
                    return ($row->coin) ? $row->coin : 0;
                })
                ->addColumn('transaction_id', function($row)
                {
                    return ($row->transaction_id) ? $row->transaction_id : 'N/A';
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
                ->rawColumns(['action', 'status', 'currency','transaction_id', 'user', 'coin'])
                ->make(true);
        }

        return view('backend.coin-agency-recharge-request-admin.index', $data);
    }

    public function edit($id)
    {   
        $model = CoinAgencyRechargeRequest::with('user')->find($id);

        if($model->approval_status == 'Approved' || $model->approval_status == 'Rejected')
        {
            return redirect()->route('coin-agency-recharge-request-list');
        }

        $data = [
            'title'              => 'Edit Recharge Request',
            'currencies'         => Currency::select('id', 'short_code')->get(),
            'model'              => $model
        ];

        return view('backend.coin-agency-recharge-request-admin.edit', $data);
    }

    public function update(Request $request)
    {   
        DB::beginTransaction();

        try 
        {   
            if($request->status == 'Approved')
            {
                $validator = Validator::make($request->all(), [
                    'currency_id'           => 'required',
                    'amount'                => 'required',
                    'payment_type'          => 'required',
                    'coin'                  => 'required'
                ]);
            }
            else 
            {
                $validator = Validator::make($request->all(), [
                    'currency_id'           => 'required',
                    'amount'                => 'required',
                    'payment_type'          => 'required'
                ]);
            }
            
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }

            $model  = CoinAgencyRechargeRequest::find($request->model_id);

            if($model->approval_status == 'Approved' || $model->approval_status == 'Rejected')
            {
                $response = [
                    'status'    => false,
                    'message'   => 'Already '.$model->approval_status.'by admin!You can not update now!'
                ];
        
                return response()->json($response);
            }
            
            $model->user_id                 = $request->user_id;
            $model->currency_id             = $request->currency_id;
            $model->amount                  = $request->amount;
            $model->coin                    = ($request->status == 'Approved') ? $request->coin : null;
            $model->payment_type            = $request->payment_type;
            $model->transaction_id          = $request->transaction_id;
            $model->approval_status         = $request->status;
            $model->update();

            if($request->status == 'Approved')
            {
                $coinAgencyWalletExist = CoinAgencyWallet::where('user_id', $request->user_id)->first();

                if($coinAgencyWalletExist)
                {
                    $coinAgencyWalletExist->total_amount = $coinAgencyWalletExist->total_amount + $request->amount;
                    $coinAgencyWalletExist->total_coin = $coinAgencyWalletExist->total_coin + $request->coin;
                    $coinAgencyWalletExist->update();
                }
                else
                {
                    $coinAgencyWallet = new CoinAgencyWallet;
                    $coinAgencyWallet->user_id = $request->user_id;
                    $coinAgencyWallet->total_amount = $request->amount;
                    $coinAgencyWallet->total_coin = $request->coin;
                    $coinAgencyWallet->save();
                }
            }

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Recharge request updated successfully!'
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
            CoinAgencyRechargeRequest::find($id)->delete();

            DB::commit();
            
            $response = [
                'status'    => true,
                'message'   => 'Recharge request deleted successfully!'
            ];

            return response()->json($response);
        }
        catch (\Exception $e) 
        {
            DB::rollback();
        }
    }
}
