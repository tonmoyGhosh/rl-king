<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\SmsCampaign;
use App\Models\CampaignStatus;
use App\Models\Group;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SmsCampaignLog;
use Validator;
use Auth;

class SmsCampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'count_sms_campaign' => SmsCampaign::latest()->count(),
            'title'              => 'Sms Campaign List'
        ];

        if($request->ajax())
        {
            $q_user = SmsCampaign::with('group', 'campaign_status')->orderByDesc('created_at');

            return Datatables::of($q_user)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){

                        if($row->campaign_status->status == 'Success')
                            $btn = '<span class="badge badge-success">'.$row->campaign_status->status.'</span>';
                        else if($row->campaign_status->status == 'Pending')
                            $btn = '<span class="badge badge-warning">'.$row->campaign_status->status.'</span>';
                        else if($row->campaign_status->status == 'Running')
                            $btn = '<span class="badge badge-info">'.$row->campaign_status->status.'</span>';
                        else if($row->campaign_status->status == 'Failed')
                            $btn = '<span class="badge badge-danger">'.$row->campaign_status->status.'</span>';
                        else
                            $btn = '<span class="badge badge-secondary">'.$row->campaign_status->status.'</span>';

                        return $btn;
                    })
                    ->addColumn('action', function($row){

                        $btn = '';

                        // if($row->campaign_status->status == 'Success' || $row->campaign_status->status == 'Paused' || $row->campaign_status->status == 'Failed')
                        // {
                        //     $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteUser"><i class="fi-rr-trash"></i></div>';
                        // }

                        $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 smsCampaignView"><i class=" fi-rr-eye"></i></div>';
                        
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }

        return view('backend.sms_campaign.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'count_sms_campaign' => SmsCampaign::latest()->count(),
            'title'              => 'Create Sms Campaign',
            'groupList'          => Group::get(),
            'setting'            => Setting::first()
        ];

        return view('backend.sms_campaign.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(), [
                'campaign_title'    => 'required',
                'mask_title'        => 'required',
                'group'             => 'required',
                'start_at'          => 'required',
                'message'           => 'required'
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
    
            $smsCampaign                    = new SmsCampaign();
            $smsCampaign->group_id          = $request->group;
            $smsCampaign->campaign_title    = $request->campaign_title;
            $smsCampaign->mask_title        = $request->mask_title;
            $smsCampaign->start_at          = date('Y-m-d H:i:s', strtotime($request->start_at));
            $smsCampaign->message           = $request->message;
            $smsCampaign->created_by        = Auth::user()->id;
            $smsCampaign->save();
    
            $campaignStatus                 = new CampaignStatus();
            $campaignStatus->campaign_id    = $smsCampaign->id;
            $campaignStatus->status         = 'Pending';
            $campaignStatus->type           = 'Sms';
            $campaignStatus->created_by     = Auth::user()->id;
            $campaignStatus->save();
    
            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Sms campaign saved successfully!'
            ];
    
            return response()->json($response);

        }
        catch (\Exception $e) 
        {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $smsCampaign = SmsCampaign::with('group', 'campaign_status')->find($id);

        $data = [
            'count_sms_campaign' => SmsCampaign::latest()->count(),
            'title'              => 'Sms Campaign Details',
            'smsCampaign'        => $smsCampaign
        ];

        return view('backend.sms_campaign.view',$data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = [
        //     'count_sms_campaign' => SmsCampaign::latest()->count(),
        //     'title'              => 'Edit Sms Campaign',
        //     'groupList'          => Group::with('contact')->get()
        // ];

        // return view('backend.sms_campaign.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // DB::beginTransaction();

        // try 
        // {   
        //     $smsCampaign                = SmsCampaign::find($id);
        //     $smsCampaign->deleted_by    = Auth::user()->id;

        //     $campaignStatus             = CampaignStatus::where('campaign_id', $id)->where('type', 'Sms')->first();
        //     $campaignStatus->deleted_by = Auth::user()->id;

        //     SmsCampaign::find($id)->delete();
        //     CampaignStatus::where('campaign_id', $id)->where('type', 'Sms')->delete();
            
        //     $smsCampaign->update();
        //     $campaignStatus->update();

        //     $response = [
        //         'status'    => true,
        //         'message'   => 'Sms campaign deleted successfully!'
        //     ];

        //     return response()->json($response);

        //     DB::commit();
        // }
        // catch (\Exception $e) 
        // {
        //     DB::rollback();
        // }
    }
}
