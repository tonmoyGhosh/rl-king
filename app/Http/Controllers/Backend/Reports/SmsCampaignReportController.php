<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Helper\IvrCampaignHelper;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\IvrCampaign;
use Redirect;
use PDF;
use App;
use App\Helper\SmsCampaignHelper;

class SmsCampaignReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function smsCampaignReport()
    {
        $data = [
            'title' => 'Ivr Outbound Voice Call Report'
        ];

        return view('backend.reports.sms.sms_outgoing_report', $data);
    }

    public function requestSmsCampaignReport()
    {
        ($request->status) ? $status = $request->status : $status = 'Success';

        $smsCampaigns = IvrCampaign::select('id as campaign_id', 'campaign_title', 'start_at as schedule')
            ->whereHas('campaign_status', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->withCount(['campaign_with_contacts as total_calls'])
            ->withCount(['total_receive_calls as total_receive_calls'])
            ->withCount(['total_failed_calls as total_failed_calls'])
            ->withCount(['sms_send as total_sms_send'])
            ->paginate(30);

        return Redirect::back()->with(['smsCampaigns' => $smsCampaigns]);
    }

    public function usageReportSms()
    {
        $area = Contact::groupBy('area')
            ->select('area')->orderBy('area', 'DESC')->get();

        $district = Contact::groupBy('district')
            ->select('district')->orderBy('district', 'DESC')->get();

        $division = Contact::groupBy('division')
            ->select('division')->orderBy('division', 'DESC')->get();


        $data = [
            'title' => 'SMS Outgoing Report',
            'area' => $area,
            'district' => $district,
            'division' => $division
        ];

        return view('backend.reports.sms.sms_outgoing_report.usage_report', $data);
    }

    public function requestUsageReportSms(Request $request)
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

        //Target Audience Area Wise
        $smsTargetAudiencesAreaWise = $smsCampaignObject->smsTargetAudienceAreaWise($filterList);

        //All SMS Campaigns Data
        $smsCampaignRecords = $smsCampaignObject->smsCampaignsDataAreaWise($filterList);

        ($request->gender) ? $gender = $request->gender : $gender = 'All';
        $dateFrom = date('d M Y', strtotime($request->fromDate));
        $dateTo = date('d M Y', strtotime($request->toDate));

        if ($request->district) $location = $request->district;
        else if ($request->area) $location = $request->area;
        else if ($request->division) $location = $request->division;
        else $location = 'All';

        $data = [
            'area' => array_keys($smsCampaignRecords),
            'smsTargetAudiencesAreaWise' => $smsTargetAudiencesAreaWise,
            'smsCampaignRecords' => $smsCampaignRecords,

            'gender' => $gender,
            'location' => $location,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo

        ];

        return Redirect::back()->with(['data' => $data]);
    }



    public function usageReportSmsPdf(Request $request)
    {
        $data = [
            'title' => 'SMS Outgoing Report',
            'area' => $request->area,
            'smsTargetAudiencesAreaWise' => $request->smsTargetAudiencesAreaWise,
            'smsSent' => $request->smsSent,
            'smsDelivered' => $request->smsDelivered,
            'smsFailed' => $request->smsFailed,
            'gender' => $request->gender,
            'location' => $request->location,
            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo
        ];

        $pdf = PDF::loadView('backend.reports.sms.sms_outgoing_report.usage_report_pdf', $data);
        return $pdf->download('SMS Outgoing Report.pdf');

    }


}
