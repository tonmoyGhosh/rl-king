<?php

namespace App\Http\Controllers\Backend\ListReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\IvrCampaignHelper;
use DataTables;
use App\Models\Contact;
use App\Models\CampaignWithContact;
use Yajra\DataTables\Html\Button;
use Illuminate\Support\Facades\DB;

class IvrListReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ivrTargetAudienceReport(Request $request)
    {
        $area = Contact::groupBy('area')
            ->select('area')->orderBy('area', 'DESC')->get();

        $district = Contact::groupBy('district')
            ->select('district')->orderBy('district', 'DESC')->get();

        $division = Contact::groupBy('division')
            ->select('division')->orderBy('division', 'DESC')->get();

        $stakeholder = Contact::groupBy('stakeholder')
            ->select('stakeholder')->orderBy('stakeholder', 'DESC')->get();

        $data = [
            'title' => 'IVR Target Audience Report',
            'area' => $area,
            'district' => $district,
            'division' => $division,
            'stakeholder' => $stakeholder,
        ];
        if ($request->ajax())
        {
            $ivrTargetAudiences = [];

            if(($request->get('fromDate')) && ($request->get('toDate')))
            {
                $filterList =
                [
                    'dateFrom' => ($request->get('fromDate')) ? $request->get('fromDate') : null,
                    'dateTo'   => ($request->get('toDate')) ? $request->get('toDate') : null,
                    'gender'   => ($request->get('gender')) ? $request->get('gender') : null,
                    'area'     => ($request->get('area')) ? $request->get('area') : null,
                    'district' => ($request->get('district')) ? $request->get('district') : null,
                    'division' => ($request->get('division')) ? $request->get('division') : null,
                    'stakeholder' => ($request->get('stakeholder')) ? $request->get('stakeholder') : null,
                ];

                $ivrCampaignObject = new IvrCampaignHelper;
                //Target Audience stackholder
                $ivrTargetAudiences = $ivrCampaignObject->getTargetAudience($filterList);
            }

            return Datatables::of($ivrTargetAudiences)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    return ($row->name) ? strtolower($row->name) : 'N/A';
                })
                ->addColumn('gender', function($row){
                    return ($row->gender) ? strtolower($row->gender) : 'N/A';
                })
                ->addColumn('grade', function($row){
                    return ($row->grade) ? $row->grade : 'N/A';
                })
                ->addColumn('stakeholder', function($row){
                    return ($row->stakeholder) ? strtolower($row->stakeholder) : 'N/A';
                })
                ->addColumn('occupation', function($row){
                    return ($row->occupation) ? strtolower($row->occupation) : 'N/A';
                })
                ->addColumn('division', function($row){
                    return ($row->division) ? strtolower($row->division) : 'N/A';
                })
                ->addColumn('district', function($row){
                    return ($row->district) ? strtolower($row->district) : 'N/A';
                })
                ->addColumn('area', function($row){
                    return ($row->area) ? strtolower($row->area) : 'N/A';
                })
                ->rawColumns(['name', 'gender', 'grade', 'stakeholder', 'occupation', 'division', 'district', 'area'])
                ->make(true);
        }

        return view('backend.list_reports.ivr.target_audience.target_audience_report', $data);
    }

    public function outboundIvrCampaignReport(Request $request)
    {   
        $data = [
            'title' => 'Outbound IVR Campaign Report',
        ];

        $outboundIvrCampaigns = [];

        if ($request->ajax()) {

            if (($request->get('fromDate')) && ($request->get('toDate'))) {

                $dateFrom = ($request->get('fromDate')) ? $request->get('fromDate') : null;
                $dateTo   = ($request->get('toDate')) ? $request->get('toDate') : null;

                $outboundIvrCampaigns = DB::select(DB::raw("SELECT
                                                    t2.campaign_id,
                                                    t1.campaign_title,
                                                    t1.start_at AS schedule_time,
                                                    COUNT(t3.id) AS outbound_call,
                                                    call_received,
                                                    content_link_send,
                                                    call_withdrawn
                                                FROM ivr_campaigns AS t1
                                                JOIN campaign_with_contacts AS t2 ON t2.campaign_id = t1.id
                                                JOIN contacts AS t3 ON t3.id = t2.contact_id
                                                LEFT JOIN(
                                                SELECT
                                                    campaign_with_contacts.campaign_id,
                                                    COUNT(contacts.id) AS call_received
                                                FROM campaign_with_contacts 
                                                JOIN contacts ON contacts.id = campaign_with_contacts.contact_id
                                                WHERE campaign_with_contacts.called = 'Yes' AND campaign_with_contacts.uniqueid IS NOT NULL
                                                GROUP BY campaign_with_contacts.campaign_id
                                                ) AS t4
                                                ON t4.campaign_id = t1.id
                                                LEFT JOIN(
                                                SELECT
                                                    campaign_with_contacts.campaign_id,
                                                    COUNT(contacts.id) AS content_link_send
                                                FROM campaign_with_contacts 
                                                JOIN contacts ON contacts.id = campaign_with_contacts.contact_id
                                                WHERE campaign_with_contacts.called = 'Yes' AND campaign_with_contacts.uniqueid IS NOT NULL AND sms_send = 'Yes'
                                                GROUP BY campaign_with_contacts.campaign_id
                                                ) AS t5
                                                ON t5.campaign_id = t1.id
                                                LEFT JOIN(
                                                SELECT
                                                    campaign_with_contacts.campaign_id,
                                                    COUNT(contacts.id) AS call_withdrawn
                                                FROM campaign_with_contacts 
                                                JOIN contacts ON contacts.id = campaign_with_contacts.contact_id
                                                JOIN ivr_log ON ivr_log.uniqueid = campaign_with_contacts.uniqueid
                                                WHERE campaign_with_contacts.called = 'Yes' AND campaign_with_contacts.uniqueid IS NOT NULL AND ivr_log.duration < 30
                                                GROUP BY campaign_with_contacts.campaign_id
                                                ) AS t6
                                                ON t6.campaign_id = t1.id
                                                WHERE DATE_FORMAT(t1.start_at, '%Y-%m-%d') >= '$dateFrom' AND DATE_FORMAT(t1.start_at, '%Y-%m-%d') <= '$dateTo'
                                                GROUP BY t2.campaign_id"));

            }

            return Datatables::of($outboundIvrCampaigns)
                ->addIndexColumn()
                ->addColumn('campaign_title', function ($row) {
                    return $row->campaign_title;
                })
                ->addColumn('schedule_time', function ($row) {
                    return ($row->schedule_time) ? $row->schedule_time : 'N/A';
                })
                ->addColumn('outbound_call', function ($row) {
                    return ($row->outbound_call) ? $row->outbound_call : '0';
                })
                ->addColumn('call_received', function ($row) {
                    return ($row->call_received) ? $row->call_received : '0';
                })
                ->addColumn('call_withdrawn', function ($row) {

                    return ($row->call_withdrawn) ? $row->call_withdrawn : '0';
                })
                ->addColumn('content_link_send', function ($row) {
                    return ($row->content_link_send) ? $row->content_link_send : '0';
                })
                ->addColumn('action', function($row){

                    $btn = '';

                    $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->campaign_id.'" data-original-title="Show" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 ivrSmsDetailView"><i class=" fi-rr-eye"></i></div>';

                    return $btn;
                })
                ->rawColumns(['action', 'campaign_title','schedule_time','outbound_call','call_received','call_withdrawn','content_link_send'])
                ->make(true);
        }

        return view('backend.list_reports.ivr.outbound_campaign.outbound_campaign_report', $data);
    }

    public function outboundIvrCampaignReportDetails(Request $request, $id)
    {   
        $area = Contact::groupBy('area')
            ->select('area')->orderBy('area', 'DESC')->get();

        $district = Contact::groupBy('district')
            ->select('district')->orderBy('district', 'DESC')->get();

        $division = Contact::groupBy('division')
            ->select('division')->orderBy('division', 'DESC')->get();

        $stakeholder = Contact::groupBy('stakeholder')
            ->select('stakeholder')->orderBy('stakeholder', 'DESC')->get();


        $data = [
            'title' => 'Outbound IVR Campaign Report Details',
            'area' => $area,
            'district' => $district,
            'division' => $division,
            'stakeholder' => $stakeholder,
        ];

        $outboundAllCampaignDetails = [];

        if ($request->ajax()) {

            $gender   = ($request->get('gender')) ? $request->get('gender') : null;
            $area     = ($request->get('area')) ? $request->get('area') : null;
            $district = ($request->get('district')) ? $request->get('district') : null;
            $division = ($request->get('division')) ? $request->get('division') : null;
            $stakeholder = ($request->get('stakeholder')) ? $request->get('stakeholder') : null;    


            $allRecord = DB::table('contacts')
                                ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
                                ->where('campaign_with_contacts.campaign_id', $id);

                        if ($gender && $gender != null) {
                            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
                            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
                        }
                        if ($stakeholder && $stakeholder != null) {
                            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
                            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
                        }
                        if ($area && $area != null) {
                            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
                            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
                        }
                        if ($district && $district != null) {
                            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
                            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
                        }
                        if ($division && $division != null) {
                            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
                            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
                        }   

            $allRecord->select(DB::raw('UPPER(contacts.stakeholder) as stakeholder, UPPER(contacts.gender) as gender,UPPER(contacts.area) as area, UPPER(contacts.      district) as district, UPPER(contacts.division) as division'), 'contacts.grade', 'contacts.phone_number as phone_number', 'contacts.name', 'contacts.occupation', 'campaign_with_contacts.campaign_id')
            ->groupBy('campaign_with_contacts.id');

            $outboundAllCampaignDetails = $allRecord->get();
    

                return Datatables::of($outboundAllCampaignDetails)
                    ->addIndexColumn()
                    ->addColumn('name', function ($row) {
                        return ($row->name) ? strtolower($row->name) : 'N/A';
                    })
                    ->addColumn('gender', function ($row) {
                        return ($row->gender) ? strtolower($row->gender) : 'N/A';
                    })
                    ->addColumn('grade', function ($row) {
                        return ($row->grade) ? $row->grade : 'N/A';
                    })
                    ->addColumn('stakeholder', function ($row) {
                        return ($row->stakeholder) ? strtolower($row->stakeholder) : 'N/A';
                    })
                    ->addColumn('occupation', function ($row) {
                        return ($row->occupation) ? strtolower($row->occupation) : 'N/A';
                    })
                    ->addColumn('division', function ($row) {
                        return ($row->division) ? strtolower($row->division) : 'N/A';
                    })
                    ->addColumn('district', function ($row) {
                        return ($row->district) ? strtolower($row->district) : 'N/A';
                    })
                    ->addColumn('area', function ($row) {
                        return ($row->area) ? strtolower($row->area) : 'N/A';
                    })
                    ->rawColumns([ 'name', 'gender', 'grade', 'stakeholder', 'occupation', 'division', 'district', 'area'])
                    ->make(true);
        }

        return view('backend.list_reports.ivr.outbound_campaign.outbound_campaign_report_details', $data);
        
    }
}
