<?php

namespace App\Http\Controllers\Backend\ListReports;

use App\Helper\SmsCampaignHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\IvrCampaignHelper;
use DataTables;
use App\Models\Contact;
use Yajra\DataTables\Html\Button;
use Illuminate\Support\Facades\DB;
use Redirect;
use Carbon\Carbon;

class SmsListReportController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }


    public function list_view(Request $request, $id)
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
            'title' => 'SMS Outbound Campaign Details Report',
            'area' => $area,
            'district' => $district,
            'division' => $division,
            'stakeholder' => $stakeholder,
        ];


        if ($request->ajax()) {

            $smsCampaignIvr = [];

                $filterList =
                    [
                        'gender'   => ($request->get('gender')) ? $request->get('gender') : null,
                        'area'     => ($request->get('area')) ? $request->get('area') : null,
                        'district' => ($request->get('district')) ? $request->get('district') : null,
                        'division' => ($request->get('division')) ? $request->get('division') : null,
                        'stakeholder' => ($request->get('stakeholder')) ? $request->get('stakeholder') : null,
                    ];

                $smsCampaignHelper = new SmsCampaignHelper();
                $smsCampaignIvr = $smsCampaignHelper->smsCampaignsDataById($filterList, $id);

            return Datatables::of($smsCampaignIvr)
                ->addIndexColumn()
//                ->addColumn('campaign_id', function ($row) {
//                    return ($row->campaign_id) ? strtolower($row->campaign_id) : 'N/A';
//                })
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


        return view('backend.list_reports.sms.outbound_campaign.campaign_report', $data);
    }

    public function usageReportSmsCampaign(Request $request)
    {
        $data = [
            'title' => 'SMS Outbound Campaign Report',
        ];

        if ($request->ajax()) {

            $smsCampaignIvr = [];

            if (($request->get('fromDate')) && ($request->get('toDate'))) {

                $dateFrom = ($request->get('fromDate')) ? $request->get('fromDate') : null;
                $dateTo   = ($request->get('toDate')) ? $request->get('toDate') : null;

                $smsCampaignIvr =DB::select(DB::raw("SELECT t1.id,t1.campaign_title, t1.start_at, t1.group_id, COUNT(t2.campaign_id) as total_sms, t3.total_success, t4.total_failed,  count(DISTINCT t2.phone_number) as total_Audience ,t1.start_at as schedule
                                        FROM sms_campaigns as t1
                                        JOIN sms_campaign_logs as t2 on t2.campaign_id = t1.id
                                        LEFT JOIN(
                                                SELECT campaign_id, count(status) as total_success FROM sms_campaign_logs
                                            WHERE STATUS = 'Success' GROUP BY campaign_id
                                        ) as t3 ON t3.campaign_id = t1.id
                                        LEFT JOIN(
                                                SELECT campaign_id, count(status) as total_failed FROM sms_campaign_logs
                                            WHERE STATUS = 'Failed' GROUP BY campaign_id
                                        ) as t4 ON t4.campaign_id = t1.id
                                        where DATE_FORMAT(t1.start_at, '%Y-%m-%d') >= '$dateFrom' AND DATE_FORMAT(t1.start_at, '%Y-%m-%d') <= '$dateTo'
                                        GROUP BY t2.campaign_id"));


            }

            return Datatables::of($smsCampaignIvr)
                ->addIndexColumn()
//                ->addColumn('campaign_id', function ($row) {
//                    return ($row->campaign_id) ? strtolower($row->campaign_id) : 'N/A';
//                })
                ->addColumn('campaign_title', function ($row) {
                    return $row->campaign_title;
                })
                ->addColumn('total_Audience', function ($row) {
                    return ($row->total_Audience) ? $row->total_Audience : '0';
                })
                ->addColumn('total_sms', function ($row) {
                    return ($row->total_sms) ? $row->total_sms : '0';
                })
                ->addColumn('total_success', function ($row) {
                    return ($row->total_success) ? $row->total_success : '0';
                })
                ->addColumn('total_failed', function ($row) {
                    return ($row->total_failed) ? $row->total_failed : '0';
                })
                ->addColumn('action', function($row){

                    $btn = '';

                    $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 ivrSmsDetailView"><i class=" fi-rr-eye"></i></div>';

                    return $btn;
                })
                ->rawColumns(['action', 'campaign_title','total_Audience','total_sms','total_success','total_failed'])
                ->make(true);
        }

        return view('backend.list_reports.sms.outbound_campaign.usage_report_campaign', $data);



    }

    public function requestUsageReportSmsCampaign(Request $request)
    {


        $filterList =
            [
                'dateFrom' => $request->fromDate,
                'dateTo' => $request->toDate,
                'gender' => $request->gender,
                'area' => $request->area,
                'district' => $request->district,
                'division' => $request->division
            ];

        $smsCampaignObject = new SmsCampaignHelper;
        $smsCampaigns = DB::table('sms_campaigns')
            ->when($request->fromDate, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(sms_campaigns.start_at, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($request->toDate, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(sms_campaigns.start_at, '%Y-%m-%d')"), '<=', $dateTo);
            })

            ->select('id', 'start_at', 'campaign_title')
            ->groupBy('id')
            ->get()
            ->keyBy('id')->toArray();

        $smsCampaignRecords = $smsCampaignObject->smsCampaignsDataCampaignWise($filterList);
        $smsTargetAudiencesCampaignWise = $smsCampaignObject->smsTargetAudienceCampaignWise($filterList, array_keys( $smsCampaigns));

        ($request->gender) ? $gender = $request->gender : $gender = 'All';
        $dateFrom = date('d M Y', strtotime($request->fromDate));
        $dateTo = date('d M Y', strtotime($request->toDate));

        if ($request->district) $location = $request->district;
        else if ($request->area) $location = $request->area;
        else if ($request->division) $location = $request->division;
        else $location = 'All';

        $data = [
            'campaigns' => array_keys($smsCampaignRecords),
            'smsTargetAudiencesCampaignWise' => $smsTargetAudiencesCampaignWise,
            'smsCampaignRecords' => $smsCampaignRecords,
            'smsCampaignData' => $smsCampaigns,

            'gender' => $gender,
            'location' => $location,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo

        ];

        return Redirect::back()->with(['data' => $data]);
    }





}
