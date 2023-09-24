<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Auth;
use App\Models\CoinAgencyRechargeRequest;
use App\Models\Currency;
use Validator;

class CoinAgencyRechargeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   
        $userId = Auth::user()->id;

        $data = [
            'count_user' => CoinAgencyRechargeRequest::where('user_id', $userId)->latest()->count(),
            'title'    => 'Recharge List'
        ];

        if($request->ajax()) 
        {
            $data = CoinAgencyRechargeRequest::with('currency')->where('user_id', $userId)->select('*')
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

                    return $btn;
                })
                ->rawColumns(['action', 'status', 'currency','transaction_id', 'coin'])
                ->make(true);
        }

        return view('backend.coin-agency-recharge-request.index', $data);
    }

    public function create()
    {
        $data = [
            'title'              => 'Add New Recharge Request',
            'currencies'         => Currency::select('id', 'short_code')->get()
        ];

        return view('backend.coin-agency-recharge-request.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(), [
                'currency_id'           => 'required',
                'amount'                => 'required',
                'payment_type'          => 'required'
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
    
            $model                          = new CoinAgencyRechargeRequest();
            $model->user_id                 = Auth::user()->id;
            $model->currency_id             = $request->currency_id;
            $model->amount                  = $request->amount;
            $model->payment_type            = $request->payment_type;
            $model->transaction_id          = $request->transaction_id;
            $model->save();

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Recharge request saved successfully!'
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
        $model = CoinAgencyRechargeRequest::find($id);

        if($model->approval_status == 'Approved' || $model->approval_status == 'Rejected')
        {
            return redirect()->route('coin-agency-recharge-list');
        }

        $data = [
            'title'              => 'Edit Recharge Request',
            'currencies'         => Currency::select('id', 'short_code')->get(),
            'model'              => $model
        ];

        return view('backend.coin-agency-recharge-request.edit', $data);
    }

    public function update(Request $request)
    {   
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(), [
                'currency_id'           => 'required',
                'amount'                => 'required',
                'payment_type'          => 'required'
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }

            $model                          = CoinAgencyRechargeRequest::find($request->model_id);

            if($model->approval_status == 'Approved' || $model->approval_status == 'Rejected')
            {
                $response = [
                    'status'    => false,
                    'message'   => 'Already '.$model->approval_status.'by admin!You can not update now!'
                ];
        
                return response()->json($response);
            }
            
            $model->user_id                 = Auth::user()->id;
            $model->currency_id             = $request->currency_id;
            $model->amount                  = $request->amount;
            $model->payment_type            = $request->payment_type;
            $model->transaction_id          = $request->transaction_id;
            $model->update();

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
            $existData = CoinAgencyRechargeRequest::whereIn('approval_status', ['Approved', 'Rejected'])
                                        ->where('id', $id)->first();

            if($existData) {
                $response = [
                    'status'    => false,
                    'message'   => 'Already '.$existData->approval_status.' by admin, you can not delete now'
                ];
    
                return response()->json($response);
            }

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
