<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Exception;
use Html;
use CreateDocx;
use App\Helper\IvrCampaignHelper;
use App\Models\SmsCampaignLog;
use App\Models\SmsCampaign;
use App\Models\CampaignWithContact;
use Redirect;

class MonthlySummaryReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createGenerateBody()
    {
        $data=[
            'title' => 'Generate Body'
        ];

        return view('backend.reports.monthly_summary_reports.generate_body',$data);
    }

    public function requestCreateGenerateBody(Request $request)
    {
        $image = Setting::pluck('logo')->first();
        $company_name = Setting::pluck('company_name')->first();
        $company_address = Setting::pluck('company_address')->first();
        $mydate = getdate(date("U"));

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();
        $section->addImage(env('APP_URL').$image, ['alignment' => 'center', 'width'=> 200]);
        //$section->addText($company_name, ['size'=> 20, 'bold' => true], ['alignment' => 'center']);
        //$section->addText($company_address, ['size'=> 12], ['alignment' => 'center', 'spaceAfter'=> 500]);
        $section->addText("Report generated at: ".$mydate['weekday'] .", ". $mydate['month']." ".$mydate['mday'].", ".$mydate['year'], ['size'=> 10], ['alignment' => 'end', 'spaceAfter'=> 500]);
        $section->addText("Monthly Progress Report", ['size'=> 15, 'bold' => true], ['alignment' => 'center','spaceAfter'=> 700]);

        $table = str_replace("&amp;", "and", preg_replace("/\r|\n|\t/", "",
                    "<table align='center' style='width: 100%; border: 1px #000000 solid;'>"
                                ."<tr style='width: 50%'>"
                                    ."<th align='center'>".$request->header1."</th>"
                                    ."<th align='center'>".$request->header2."</th>"
                                ."</tr>"
                                ."<tr style='width: 50%'>"
                                    ."<td>".$request->message1."</td>"
                                    ."<td>".$request->message2."</td>"
                                ."</tr>"
                            ."</table>"));

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $table, false, false);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('app/public/reports/Ivr Monthly Progress Report.docx'));
        } catch (Exception $e) {
        }
//
        return redirect()->back()->with(['download' => '/storage/reports/Ivr Monthly Progress Report.docx']);
//        return response()->download(storage_path('Ivr Monthly Progress Report.docx'));
    }

    public function createInfographyGenerator()
    {
        $data=[
            'title' => 'Infography Generator'
        ];
        return view('backend.reports.monthly_summary_reports.infography_generator',$data);
    }

    public function requestCreateInfographyGenerator(Request $request)
    {
        return $request;
        $current_month = date("Y-m", strtotime(str_replace(' ','-',"1-".$request->toDate)));
        $previous_month = date("Y-m", strtotime($current_month. ' -1 months'));

        $date = Carbon::now();
        if (isset($request->toDate)) {
            $myDate = '01 ' . $request->toDate;
            $date = Carbon::createFromFormat('d m Y', $myDate);
        }


        $weekEndDate = $date->endOfMonth()->format('Y-m-d');
        $weekStartDate = $date->startOfMonth()->format('Y-m-d'); //this is important for sub month


        $lastMonth = $date->subMonth();

        $lastMonthLastDate = $lastMonth->endOfMonth()->format('Y-m-d');  // sub goes to now
        $lastMonthFirstDate = $lastMonth->startOfMonth()->format('Y-m-d');

        $filterList =
            [
                'dateFrom' => $weekStartDate,
                'dateTo' => $weekEndDate,
                'gender' => $request->gender,
                'area' => $request->area,
                'district' => $request->district,
                'division' => $request->division
            ];

        $ivrOutBoundsCallDetails = new IvrCampaignHelper();
        $ivrOutBoundsCallCurretMonth = $ivrOutBoundsCallDetails->ivrOutBoundsReceivedCallDetails($filterList);
        $person_received_phone_call_current = $ivrOutBoundsCallDetails->getTargetAudienceReceived($filterList);
//        return $ivrOutBoundsCallCurretMonth;
        $filterList['dateFrom'] = $lastMonthFirstDate;
        $filterList['dateTo'] = $lastMonthLastDate;
        $person_received_phone_call_previous = $ivrOutBoundsCallDetails->getTargetAudienceReceived($filterList);
        $ivrOutBoundsCallPreviousMonth = $ivrOutBoundsCallDetails->ivrOutBoundsReceivedCallDetails($filterList);


        //1st
        $breakdown_of_ivrs_call_time_student_current_month = (clone $ivrOutBoundsCallCurretMonth)
            ->where('stakeholder', 'STUDENT')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');

        $breakdown_of_ivrs_call_time_student_previous_month = (clone $ivrOutBoundsCallPreviousMonth)
            ->where('stakeholder', 'STUDENT')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');


        $breakdown_of_ivrs_call_time_teacher_current_month = (clone $ivrOutBoundsCallCurretMonth)
            ->where('stakeholder', 'TEACHER')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');

        $breakdown_of_ivrs_call_time_teacher_previous_month = (clone $ivrOutBoundsCallPreviousMonth)
            ->where('stakeholder', 'TEACHER')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');


        $breakdown_of_ivrs_call_time_govt_current_month =  (clone $ivrOutBoundsCallCurretMonth)
            ->where('stakeholder', 'GOVT')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');

        $breakdown_of_ivrs_call_time_govt_previous_month = (clone $ivrOutBoundsCallPreviousMonth)
            ->where('stakeholder', 'GOVT')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');

        $breakdown_of_ivrs_call_time_staff_current_month = (clone $ivrOutBoundsCallCurretMonth)
            ->where('stakeholder', 'STAFF')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');


        $breakdown_of_ivrs_call_time_staff_previous_month = (clone $ivrOutBoundsCallPreviousMonth)
            ->where('stakeholder', 'STAFF')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');

        $breakdown_of_ivrs_call_time_unspecified_current_month = (clone $ivrOutBoundsCallCurretMonth)
            ->whereNull('stakeholder')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');

        $breakdown_of_ivrs_call_time_unspecified_previous_month = (clone $ivrOutBoundsCallPreviousMonth)
            ->whereNull('stakeholder')
            ->where('duration','!=', "")
            ->whereNotNull('duration')
            ->sum('duration');




        //2nd
        $minutes_of_ivrs_content_were_accessed_current_month = DB::table('contacts')
            ->join('ivr_log_in', 'ivr_log_in.customer_number', 'contacts.phone_number')
            ->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m')"),$current_month)
            ->sum('ivr_log_in.duration');

        $minutes_of_ivrs_content_were_accessed_previous_month = DB::table('contacts')
            ->join('ivr_log_in', 'ivr_log_in.customer_number', 'contacts.phone_number')
            ->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m')"),$previous_month)
            ->sum('ivr_log_in.duration');


        $person_received_phone_call_current_month = $person_received_phone_call_current->count();
        $person_received_phone_call_previous_month = $person_received_phone_call_previous->count();

//        $person_received_phone_call_current_month = 0;
//        $person_received_phone_call_previous_month = 0;

        $total_call_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.called','Yes')
            ->count('campaign_with_contacts.id');


        $total_call_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.called','Yes')
            ->count('campaign_with_contacts.id');

        $call_were_received_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->count('campaign_with_contacts.id');

        $call_were_received_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->count('campaign_with_contacts.id');

        $call_requested_by_stakeholder_current_month = DB::table('ivr_log_in')
            ->where(DB::raw("DATE_FORMAT(calldate, '%Y-%m')"),$current_month)
            ->count('id');

        $call_requested_by_stakeholder_previous_month = DB::table('ivr_log_in')
            ->where(DB::raw("DATE_FORMAT(calldate, '%Y-%m')"),$previous_month)
            ->count('id');

        $stakeholder_coverage_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->count('campaign_with_contacts.id');

        $stakeholder_coverage_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->count('campaign_with_contacts.id');

//        $phone_call_generated_current_month = DB::table('contacts')
//            ->join('ivr_log', 'ivr_log.customer_number', 'contacts.phone_number')
//            ->where(DB::raw("DATE_FORMAT(ivr_log.calldate, '%Y-%m')"),$current_month)
//            ->where('ivr_log.uniqueid','<>',NULL)
//            ->count('ivr_log.id');
//
//        $phone_call_generated_previous_month = DB::table('contacts')
//            ->join('ivr_log', 'ivr_log.customer_number', 'contacts.phone_number')
//            ->where(DB::raw("DATE_FORMAT(ivr_log.calldate, '%Y-%m')"),$previous_month)
//            ->where('ivr_log.uniqueid','<>',NULL)
//            ->count('ivr_log.id');


        $after_ivrs_call_sms_sent_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.sms_send','Yes')
            ->count('campaign_with_contacts.id');


        $after_ivrs_call_sms_sent_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.sms_send','Yes')
            ->count('campaign_with_contacts.id');

        $sms_campaign_current_month = DB::table('contacts')
            ->join('sms_campaign_logs', 'sms_campaign_logs.contact_id', 'contacts.id')
            ->join('sms_campaigns', 'sms_campaign_logs.campaign_id', 'sms_campaigns.id')
            ->where(DB::raw("DATE_FORMAT(sms_campaigns.start_at, '%Y-%m')"),$current_month)
            ->where('sms_campaign_logs.status','Success')
            ->count('sms_campaign_logs.id');

        $sms_campaign_previous_month = DB::table('contacts')
            ->join('sms_campaign_logs', 'sms_campaign_logs.contact_id', 'contacts.id')
            ->join('sms_campaigns', 'sms_campaign_logs.campaign_id', 'sms_campaigns.id')
            ->where(DB::raw("DATE_FORMAT(sms_campaigns.start_at, '%Y-%m')"),$previous_month)
            ->where('sms_campaign_logs.status','Success')
            ->count('sms_campaign_logs.id');


        $sms_notification_were_sent_current_month = $after_ivrs_call_sms_sent_current_month + $sms_campaign_current_month;

        $sms_notification_were_sent_previous_month = $after_ivrs_call_sms_sent_previous_month+ $sms_campaign_previous_month;


        //3rd

        $stakeholder_listened_of_ivrs_content_student_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->where('contacts.stakeholder','Student')
            ->count('campaign_with_contacts.id');

        $stakeholder_listened_of_ivrs_content_student_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->where('contacts.stakeholder','Student')
            ->count('campaign_with_contacts.id');



        $stakeholder_listened_of_ivrs_content_teacher_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->where('contacts.stakeholder','Teacher')
            ->count('campaign_with_contacts.id');

        $stakeholder_listened_of_ivrs_content_teacher_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->where('contacts.stakeholder','Teacher')
            ->count('campaign_with_contacts.id');



        $stakeholder_listened_of_ivrs_content_govt_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->where('contacts.stakeholder','Govt')
            ->count('campaign_with_contacts.id');

        $stakeholder_listened_of_ivrs_content_govt_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->where('contacts.stakeholder','Govt')
            ->count('campaign_with_contacts.id');



        $stakeholder_listened_of_ivrs_content_staff_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->where('contacts.stakeholder','Staff')
            ->count('campaign_with_contacts.id');

        $stakeholder_listened_of_ivrs_content_staff_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->where('contacts.stakeholder','Staff')
            ->count('campaign_with_contacts.id');


        $stakeholder_listened_of_ivrs_content_unspecified_current_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$current_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->whereNull('contacts.stakeholder')
            ->count('campaign_with_contacts.id');

        $stakeholder_listened_of_ivrs_content_unspecified_previous_month = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m')"),$previous_month)
            ->where('campaign_with_contacts.uniqueid','<>',NULL)
            ->whereNull('contacts.stakeholder')
            ->count('campaign_with_contacts.id');

        $data = [

            'current_month'                                       => $current_month,
            'previous_month'                                      => $previous_month,

            //1st Graph
            'breakdown_of_ivrs_call_time_student_current_month'   => $breakdown_of_ivrs_call_time_student_current_month/60,
            'breakdown_of_ivrs_call_time_student_previous_month'  => $breakdown_of_ivrs_call_time_student_previous_month/60,
            'breakdown_of_ivrs_call_time_teacher_current_month'   => $breakdown_of_ivrs_call_time_teacher_current_month/60,
            'breakdown_of_ivrs_call_time_teacher_previous_month'  => $breakdown_of_ivrs_call_time_teacher_previous_month/60,
            'breakdown_of_ivrs_call_time_govt_current_month'      => $breakdown_of_ivrs_call_time_govt_current_month/60,
            'breakdown_of_ivrs_call_time_govt_previous_month'     => $breakdown_of_ivrs_call_time_govt_previous_month/60,
            'breakdown_of_ivrs_call_time_staff_current_month'     => $breakdown_of_ivrs_call_time_staff_current_month/60,
            'breakdown_of_ivrs_call_time_staff_previous_month'    => $breakdown_of_ivrs_call_time_staff_previous_month/60,
            'breakdown_of_ivrs_call_time_unspecified_current_month'=> $breakdown_of_ivrs_call_time_unspecified_current_month/60,
            'breakdown_of_ivrs_call_time_unspecified_previous_month'=>$breakdown_of_ivrs_call_time_unspecified_previous_month/60,

            //2nd Graph
            'minutes_of_ivrs_content_were_accessed_current_month' => $minutes_of_ivrs_content_were_accessed_current_month/60,
            'minutes_of_ivrs_content_were_accessed_previous_month'=> $minutes_of_ivrs_content_were_accessed_previous_month/60,
            'person_received_phone_call_current_month'            => $person_received_phone_call_current_month,
            'person_received_phone_call_previous_month'            => $person_received_phone_call_previous_month,

            'total_call_current_month'                            => $total_call_current_month,
            'total_call_previous_month'                           => $total_call_previous_month,
            'call_were_received_current_month'                    => $call_were_received_current_month,
            'call_were_received_previous_month'                   => $call_were_received_previous_month,
            'call_requested_by_stakeholder_current_month'         => $call_requested_by_stakeholder_current_month,
            'call_requested_by_stakeholder_previous_month'        => $call_requested_by_stakeholder_previous_month,
            'stakeholder_coverage_current_month'                  => $stakeholder_coverage_current_month,
            'stakeholder_coverage_previous_month'                 => $stakeholder_coverage_previous_month,
//            'phone_call_generated_current_month'                  => $phone_call_generated_current_month,
//            'phone_call_generated_previous_month'                 => $phone_call_generated_previous_month,
            'sms_notification_were_sent_current_month'            => $sms_notification_were_sent_current_month,
            'sms_notification_were_sent_previous_month'           => $sms_notification_were_sent_previous_month,


            //3rd Graph

            'stakeholder_listened_of_ivrs_content_student_current_month' => $stakeholder_listened_of_ivrs_content_student_current_month,
            'stakeholder_listened_of_ivrs_content_student_previous_month'=> $stakeholder_listened_of_ivrs_content_student_previous_month,
            'stakeholder_listened_of_ivrs_content_teacher_current_month' => $stakeholder_listened_of_ivrs_content_teacher_current_month,
            'stakeholder_listened_of_ivrs_content_teacher_previous_month' => $stakeholder_listened_of_ivrs_content_teacher_previous_month,
            'stakeholder_listened_of_ivrs_content_govt_current_month' => $stakeholder_listened_of_ivrs_content_govt_current_month,
            'stakeholder_listened_of_ivrs_content_govt_previous_month'=> $stakeholder_listened_of_ivrs_content_govt_previous_month,
            'stakeholder_listened_of_ivrs_content_staff_current_month' => $stakeholder_listened_of_ivrs_content_staff_current_month,
            'stakeholder_listened_of_ivrs_content_staff_previous_month' => $stakeholder_listened_of_ivrs_content_staff_previous_month,
            'stakeholder_listened_of_ivrs_content_unspecified_current_month'=>$stakeholder_listened_of_ivrs_content_unspecified_current_month,
            'stakeholder_listened_of_ivrs_content_unspecified_previous_month'=>$stakeholder_listened_of_ivrs_content_unspecified_previous_month,
        ];

//        return $data;

        return response()->json($data);

    }

    public function masterReportUsageSms(){
        $data=[
            'title' => 'SMS MASTER REPORT'
        ];

        return view('backend.reports.master_report_usage.sms',$data);
    }

    public function masterReportUsageVoice(){
        $data=[
            'title' => 'VOICE MASTER REPORT'
        ];

        return view('backend.reports.master_report_usage.voice',$data);
    }

    public function smsLogReport()
    {   
        $data = [
            'title' => 'SMS LOG REPORT'
        ];

        return view('backend.reports.master_report_usage.sms-log',$data);
    }

    public function smsLogReportRequest(Request $request)
    {
        $dateFrom = $request->fromDate;
        $dateTo = $request->toDate;

        $smsCampaignIds = SmsCampaign::when($dateFrom, function ($query, $dateFrom) {
                                $query->where(DB::raw("DATE_FORMAT(start_at, '%Y-%m-%d')"), '>=', $dateFrom);
                            })
                            ->when($dateTo, function ($query, $dateTo) {
                                $query->where(DB::raw("DATE_FORMAT(start_at, '%Y-%m-%d')"), '<=', $dateTo);
                            })->pluck('id');

        $successSms = SmsCampaignLog::whereIn('campaign_id', $smsCampaignIds)
                                ->where('status', 'Success')
                                ->count();

        $failSms = SmsCampaignLog::whereIn('campaign_id', $smsCampaignIds)
                                ->where('status', 'Failed')
                                ->count();

        $ivrSms = CampaignWithContact::when($dateFrom, function ($query, $dateFrom) {
                                $query->where(DB::raw("DATE_FORMAT(start_at, '%Y-%m-%d')"), '>=', $dateFrom);
                            })
                            ->when($dateTo, function ($query, $dateTo) {
                                $query->where(DB::raw("DATE_FORMAT(start_at, '%Y-%m-%d')"), '<=', $dateTo);
                            })->where('called', 'Yes')->where('sms_send', 'Yes')->whereNotNull('uniqueId')->count();

        $data = [
            'successSms' => $successSms,
            'failSms'    => $failSms,
            'ivrSms'     => $ivrSms,
            'dateFrom'   => date('d M Y', strtotime($dateFrom)),
            'dateTo'     => date('d M Y', strtotime($dateTo))
        ];
                    
        return Redirect::back()->with(['data' => $data]);
    }
}
