<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\IvrCampaign;
use App\Models\CampaignStatus;
use App\Models\CampaignWithContact;
use App\Models\Group;
use App\Models\IvrFlows;
use App\Models\IvrSteps;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Contact;
use Validator;
use Auth;

class IvrVoiceCampaignController extends Controller
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
            'count_ivr_voice_campaign' => IvrCampaign::latest()->count(),
            'title'                    => 'IVR Voice Campaign List'
        ];
        
        if($request->ajax()) 
        {
            $q_user = IvrCampaign::with(['group' => function ($query) {
                $query->select('id', 'name');
            }])->with(['ivr_flow' => function ($query) {
                $query->select('id','title');
            }])->with('campaign_status')->orderByDesc('created_at');
            
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

                        $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 ivrVoiceCampaignView"><i class=" fi-rr-eye"></i></div>';
                        
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }

        return view('backend.ivr_voice_campaign.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'count_ivr_voice_campaign' => IvrCampaign::latest()->count(),
            'title'                    => 'Create IVR Voice Campaign',
            'groupList'                => Group::get(),
            'ivrFlows'                 => IvrFlows::all(),
            'setting'                  => Setting::first()
        ];
        
        return view('backend.ivr_voice_campaign.create',$data);
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
                'group'             => 'required',
                'flow'              => 'required',
                'start_at'          => 'required',
                'sender_id'         => 'required'
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
    
            $ivrVoiceCampaign                    = new IvrCampaign();
            $ivrVoiceCampaign->group_id          = $request->group;
            $ivrVoiceCampaign->ivr_flow_id       = $request->flow;
            $ivrVoiceCampaign->campaign_title    = $request->campaign_title;
            $ivrVoiceCampaign->start_at          = date('Y-m-d H:i:s', strtotime($request->start_at));
            $ivrVoiceCampaign->sender_id         = $request->sender_id;
            $ivrVoiceCampaign->sms_send          = ($request->sms_send) ? 'Yes' : 'No';
            $ivrVoiceCampaign->created_by        = Auth::user()->id;
            $ivrVoiceCampaign->save();
    
            $campaignStatus                 = new CampaignStatus();
            $campaignStatus->campaign_id    = $ivrVoiceCampaign->id;
            $campaignStatus->status         = 'Pending';
            $campaignStatus->type           = 'Ivr';
            $campaignStatus->created_by     = Auth::user()->id;
            $campaignStatus->save();

            $contactList = Contact::where('group_id', $request->group)->get();
            
            foreach($contactList as $contact)
            {
                $campaignWithContact                    = new CampaignWithContact();
                $campaignWithContact->campaign_id       = $ivrVoiceCampaign->id;
                $campaignWithContact->contact_id        = $contact->id;
                $campaignWithContact->campaign_type     = 'Ivr';
                $campaignWithContact->phone_number      = $contact->phone_number;
                $campaignWithContact->start_at          = date('Y-m-d H:i:s', strtotime($request->start_at));
                $campaignWithContact->save();
            }

            DB::commit();
           
            $response = [
                'status'    => true,
                'message'   => 'IVR voice campaign saved successfully!'
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
        $ivrVoiceCampaign = IvrCampaign::with('group', 'campaign_status')->find($id);

        $data = [
            'count_ivr_voice_campaign' => IvrCampaign::latest()->count(),
            'title'                    => 'IVR Voice Campaign Details',
            'ivrVoiceCampaign'         => $ivrVoiceCampaign
        ];

        return view('backend.ivr_voice_campaign.view',$data);
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
        //     'count_ivr_voice_campaign' => IvrCampaign::latest()->count(),
        //     'title'                    => 'Create IVR Voice Campaign',
        //     'groupList'                => Group::with('contact')->get(),
        //     'ivrFlows'                 => IvrFlow::all()
        // ];

        // return view('backend.ivr_voice_campaign.edit',$data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $ivrVoiceCampaign                = IvrCampaign::find($id);
        // $ivrVoiceCampaign->deleted_by    = Auth::user()->id;

        // $campaignStatus             = CampaignStatus::where('campaign_id', $id)->where('type', 'Ivr')->first();
        // $campaignStatus->deleted_by = Auth::user()->id;

        // IvrCampaign::find($id)->delete();
        // CampaignStatus::where('campaign_id', $id)->where('type', 'Ivr')->delete();

        // $ivrVoiceCampaign->update();
        // $campaignStatus->update();

        // $response = [
        //     'status'    => true,
        //     'message'   => 'IVR voice campaign deleted successfully!'
        // ];

        // return response()->json($response);
    }
}
