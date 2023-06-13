<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use App\Models\IvrCampaign;
use App\Models\CampaignStatus;
use App\Models\CampaignWithContact;
use App\Models\IvrClipPlayLog;
use App\Models\IvrSteps;
use Redirect;
use PDF;
use App;
use App\Helper\IvrCampaignHelper;

class IvrCampaignReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ivrOutboundVoiceCallReport(Request $request)
    {
        $data = [
            'title' => 'Ivr Outbound Voice Call Report'
        ];

        return view('backend.reports.ivr.outbound_voice_call_report', $data);
    }

    public function requestIvrOutboundVoiceCallReport(Request $request)
    {
        ($request->status) ? $status = $request->status : $status = 'Success';

        $ivrVoiceCampaigns = IvrCampaign::select('id as campaign_id', 'campaign_title', 'start_at as schedule')
            ->whereHas('campaign_status', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->withCount(['campaign_with_contacts as total_calls'])
            ->withCount(['total_receive_calls as total_receive_calls'])
            ->withCount(['total_failed_calls as total_failed_calls'])
            ->withCount(['sms_send as total_sms_send'])
            ->paginate(30);

        return Redirect::back()->with(['ivrVoiceCampaigns' => $ivrVoiceCampaigns]);

    }

    public function usageReport()
    {
        $area = Contact::groupBy('area')
            ->select('area')->orderBy('area', 'DESC')->get();

        $district = Contact::groupBy('district')
            ->select('district')->orderBy('district', 'DESC')->get();

        $division = Contact::groupBy('division')
            ->select('division')->orderBy('division', 'DESC')->get();

        $data = [
            'title' => 'Ivr Call Analysis Usage Report',
            'area' => $area,
            'district' => $district,
            'division' => $division
        ];

        return view('backend.reports.ivr.usage_report.usage_report', $data);
    }

    public function requestUsageReport(Request $request)
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


        $ivrCampaignObject = new IvrCampaignHelper;
        //Target Audience stackholder
        $ivrTargetAudiences = $ivrCampaignObject->targetAudienceStakeholderWise($filterList);

        $ivrTargetAudiencesGrade = $ivrCampaignObject->targetAudienceGradeWise($filterList);


        //Total Outbound Call
        $ivrCallOutbound = $ivrCampaignObject->ivrOutBoundsCallDetails($filterList);

        //Student Outbound Completed Call
        $ivr_call_outbound_rhyme_student = $ivrCallOutbound->where('response1', '1')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'STUDENT')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_story_student = $ivrCallOutbound->where('response1', '2')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'STUDENT')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_song_student = $ivrCallOutbound->where('response1', '3')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'STUDENT')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_riddle_student = $ivrCallOutbound->where('response1', '4')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'STUDENT')->whereNotNull('uniqueid')
            ->count();


        //Teacher Outbound Completed Call
        $ivr_call_outbound_rhyme_teacher = $ivrCallOutbound->where('response1', '1')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'TEACHER')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_story_teacher = $ivrCallOutbound->where('response1', '2')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'TEACHER')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_song_teacher = $ivrCallOutbound->where('response1', '3')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'TEACHER')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_riddle_teacher = $ivrCallOutbound->where('response1', '4')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'TEACHER')->whereNotNull('uniqueid')
            ->count();

        //Govt Outbound Completed Call
        $ivr_call_outbound_rhyme_govt = $ivrCallOutbound->where('response1', '1')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'GOVT')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_story_govt = $ivrCallOutbound->where('response1', '2')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'GOVT')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_song_govt = $ivrCallOutbound->where('response1', '3')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'GOVT')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_riddle_govt = $ivrCallOutbound->where('response1', '4')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'GOVT')->whereNotNull('uniqueid')
            ->count();


        //Staff Outbound Completed Call
        $ivr_call_outbound_rhyme_staff = $ivrCallOutbound->where('response1', '1')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'STAFF')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_story_staff = $ivrCallOutbound->where('response1', '2')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'STAFF')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_song_staff = $ivrCallOutbound->where('response1', '3')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'STAFF')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_riddle_staff = $ivrCallOutbound->where('response1', '4')
            ->where('response2', '!=', '')
            ->where('stakeholder', 'STAFF')->whereNotNull('uniqueid')
            ->count();

        //unspecified Outbound Complete Call
        $ivr_call_outbound_rhyme_unspecified = $ivrCallOutbound->where('response1', '1')
            ->where('response2', '!=', '')
            ->whereNull('stakeholder')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_story_unspecified = $ivrCallOutbound->where('response1', '2')
            ->where('response2', '!=', '')
            ->whereNull('stakeholder')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_song_unspecified = $ivrCallOutbound->where('response1', '3')
            ->where('response2', '!=', '')
            ->whereNull('stakeholder')->whereNotNull('uniqueid')
            ->count();

        $ivr_call_outbound_riddle_unspecified = $ivrCallOutbound->where('response1', '4')
            ->where('response2', '!=', '')
            ->whereNull('stakeholder')->whereNotNull('uniqueid')
            ->count();


        //Total InBound Call
        $ivrCallInbound = $ivrCampaignObject->ivrInBoundsReceivedCallDetails($filterList);

        //Student Inbound Completed Call
        $ivr_call_inbound_rhyme_student = $ivrCallInbound->where('response1', '1')
            ->where('stakeholder', 'STUDENT')
            ->count();

        $ivr_call_inbound_story_student = $ivrCallInbound->where('response1', '2')
            ->where('stakeholder', 'STUDENT')
            ->count();

        $ivr_call_inbound_song_student = $ivrCallInbound->where('response1', '3')
            ->where('stakeholder', 'STUDENT')
            ->count();

        $ivr_call_inbound_riddle_student = $ivrCallInbound->where('response1', '4')
            ->where('stakeholder', 'STUDENT')
            ->count();

        //Teacher Inbound Completed Call
        $ivr_call_inbound_rhyme_teacher = $ivrCallInbound->where('response1', '1')
            ->where('stakeholder', 'TEACHER')
            ->count();

        $ivr_call_inbound_story_teacher = $ivrCallInbound->where('response1', '2')
            ->where('stakeholder', 'TEACHER')
            ->count();

        $ivr_call_inbound_song_teacher = $ivrCallInbound->where('response1', '3')
            ->where('stakeholder', 'TEACHER')
            ->count();

        $ivr_call_inbound_riddle_teacher = $ivrCallInbound->where('response1', '4')
            ->where('stakeholder', 'TEACHER')
            ->count();

        //Govt Inbound Completed Call
        $ivr_call_inbound_rhyme_govt = $ivrCallInbound->where('response1', '1')
            ->where('stakeholder', 'GOVT')
            ->count();

        $ivr_call_inbound_story_govt = $ivrCallInbound->where('response1', '2')
            ->where('stakeholder', 'GOVT')
            ->count();

        $ivr_call_inbound_song_govt = $ivrCallInbound->where('response1', '3')
            ->where('stakeholder', 'GOVT')
            ->count();

        $ivr_call_inbound_riddle_govt = $ivrCallInbound->where('response1', '4')
            ->where('stakeholder', 'GOVT')
            ->count();


        //Staff Inbound Completed Call
        $ivr_call_inbound_rhyme_staff = $ivrCallInbound->where('response1', '1')
            ->where('stakeholder', 'STAFF')
            ->count();

        $ivr_call_inbound_story_staff = $ivrCallInbound->where('response1', '2')
            ->where('stakeholder', 'STAFF')
            ->count();

        $ivr_call_inbound_song_staff = $ivrCallInbound->where('response1', '3')
            ->where('stakeholder', 'STAFF')
            ->count();

        $ivr_call_inbound_riddle_staff = $ivrCallInbound->where('response1', '4')
            ->where('stakeholder', 'STAFF')
            ->count();

        //Unspecified Inbound Completed Call
        $ivr_call_inbound_rhyme_unspecified = $ivrCallInbound->where('response1', '1')
            ->whereNull('stakeholder')
            ->count();

        $ivr_call_inbound_story_unspecified = $ivrCallInbound->where('response1', '2')
            ->whereNull('stakeholder')
            ->count();

        $ivr_call_inbound_song_unspecified = $ivrCallInbound->where('response1', '3')
            ->whereNull('stakeholder')
            ->count();

        $ivr_call_inbound_riddle_unspecified = $ivrCallInbound->where('response1', '4')
            ->whereNull('stakeholder')
            ->count();

        //Total sms send after complete call

        $ivr_sms_student = $ivrCallOutbound->where('stakeholder', 'STUDENT')->where('sms_send', 'Yes')->count();

        $ivr_sms_teacher = $ivrCallOutbound->where('stakeholder', 'TEACHER')->where('sms_send', 'Yes')->count();

        $ivr_sms_govt = $ivrCallOutbound->where('stakeholder', 'GOVT')->where('sms_send', 'Yes')->count();

        $ivr_sms_staff = $ivrCallOutbound->where('stakeholder', 'STAFF')->where('sms_send', 'Yes')->count();

        $ivr_sms_unspecified = $ivrCallOutbound->whereNull('stakeholder')->where('sms_send', 'Yes')->count();

        $ivr_class1_sms_student = $ivrCallOutbound->where('grade', 1)->where('stakeholder', 'STUDENT')
            ->where('sms_send', 'Yes')->count();

        $ivr_class2_sms_student = $ivrCallOutbound->where('grade', 2)->where('stakeholder', 'STUDENT')
            ->where('sms_send', 'Yes')->count();

        $ivr_class3_sms_student = $ivrCallOutbound->where('grade', 3)->where('stakeholder', 'STUDENT')
            ->where('sms_send', 'Yes')->count();

        $ivr_class4_sms_student = $ivrCallOutbound->where('grade', 4)->where('stakeholder', 'STUDENT')
            ->where('sms_send', 'Yes')->count();

        $ivr_class5_sms_student = $ivrCallOutbound->where('grade', 5)->where('stakeholder', 'STUDENT')
            ->where('sms_send', 'Yes')->count();

        $ivr_unspecified_sms_student = $ivrCallOutbound->whereNull('grade')->where('stakeholder', 'STUDENT')
            ->where('sms_send', 'Yes')->count();


        //Total Outbound Call
        $ivrCallClassOutbound = $ivrCampaignObject->ivrOutBoundsCallDetails($filterList);

        //Class 1 Completed Outbound Call
        $ivr_class1_outbound_rhyme = $ivrCallClassOutbound->where('response1', 1)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 1)->count();

        $ivr_class1_outbound_story = $ivrCallClassOutbound->where('response1', 2)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 1)->count();

        $ivr_class1_outbound_song = $ivrCallClassOutbound->where('response1', 3)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 1)->count();

        $ivr_class1_outbound_riddle = $ivrCallClassOutbound->where('response1', 4)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 1)->count();


        //Class 2 Completed Outbound Call
        $ivr_class2_outbound_rhyme = $ivrCallClassOutbound->where('response1', 1)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 2)->count();

        $ivr_class2_outbound_story = $ivrCallClassOutbound->where('response1', 2)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 2)->count();

        $ivr_class2_outbound_song = $ivrCallClassOutbound->where('response1', 3)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 2)->count();

        $ivr_class2_outbound_riddle = $ivrCallClassOutbound->where('response1', 4)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 2)->count();

        //Class 3 Completed Outbound Call
        $ivr_class3_outbound_rhyme = $ivrCallClassOutbound->where('response1', 1)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 3)->count();

        $ivr_class3_outbound_story = $ivrCallClassOutbound->where('response1', 2)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 3)->count();

        $ivr_class3_outbound_song = $ivrCallClassOutbound->where('response1', 3)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 3)->count();

        $ivr_class3_outbound_riddle = $ivrCallClassOutbound->where('response1', 4)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 3)->count();


        //Class 4 Completed Outbound Call
        $ivr_class4_outbound_rhyme = $ivrCallClassOutbound->where('response1', 1)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 4)->count();

        $ivr_class4_outbound_story = $ivrCallClassOutbound->where('response1', 2)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 4)->count();

        $ivr_class4_outbound_song = $ivrCallClassOutbound->where('response1', 3)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 4)->count();

        $ivr_class4_outbound_riddle = $ivrCallClassOutbound->where('response1', '4')->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 4)->count();


        //Class 5 Completed Outbound Call
        $ivr_class5_outbound_rhyme = $ivrCallClassOutbound->where('response1', 1)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 5)->count();

        $ivr_class5_outbound_story = $ivrCallClassOutbound->where('response1', 2)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 5)->count();

        $ivr_class5_outbound_song = $ivrCallClassOutbound->where('response1', 3)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 5)->count();

        $ivr_class5_outbound_riddle = $ivrCallClassOutbound->where('response1', 4)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->where('grade', 5)->count();


        //unspecified Completed Call

        $ivr_classUnspecified_outbound_rhyme = $ivrCallClassOutbound->where('response1', 1)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->whereNotIn('grade',[1,2,3,4,5])->count();

        $ivr_classUnspecified_outbound_story = $ivrCallClassOutbound->where('response1', 2)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->whereNotIn('grade',[1,2,3,4,5])->count();

        $ivr_classUnspecified_outbound_song = $ivrCallClassOutbound->where('response1', 3)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->whereNotIn('grade',[1,2,3,4,5])->count();

        $ivr_classUnspecified_outbound_riddle = $ivrCallClassOutbound->where('response1', 4)->where('stakeholder', 'STUDENT')
            ->where('response2', '!=', '')->whereNotNull('uniqueid')->whereNotIn('grade',[1,2,3,4,5])->count();


        //Total Inbound Call
        $ivrCallInClassBound = $ivrCampaignObject->ivrInBoundsReceivedCallDetails($filterList);

        //Class 1 Completed Outbound Call
        $ivr_class1_inbound_rhyme = $ivrCallInClassBound->where('response1', '1')->where('stakeholder', 'STUDENT')
            ->where('grade', '1')->count();

        $ivr_class1_inbound_story = $ivrCallInClassBound->where('response1', '2')->where('stakeholder', 'STUDENT')
            ->where('grade', '1')->count();

        $ivr_class1_inbound_song = $ivrCallInClassBound->where('response1', '3')->where('stakeholder', 'STUDENT')
            ->where('grade', '1')->count();

        $ivr_class1_inbound_riddle = $ivrCallInClassBound->where('response1', '4')->where('stakeholder', 'STUDENT')
            ->where('grade', '1')->count();


        //Class 2 Completed Outbound Call
        $ivr_class2_inbound_rhyme = $ivrCallInClassBound->where('response1', '1')->where('stakeholder', 'STUDENT')
            ->where('grade', '2')->count();

        $ivr_class2_inbound_story = $ivrCallInClassBound->where('response1', '2')->where('stakeholder', 'STUDENT')
            ->where('grade', '2')->count();

        $ivr_class2_inbound_song = $ivrCallInClassBound->where('response1', '3')->where('stakeholder', 'STUDENT')
            ->where('grade', '2')->count();

        $ivr_class2_inbound_riddle = $ivrCallInClassBound->where('response1', '4')->where('stakeholder', 'STUDENT')
            ->where('grade', '2')->count();

        //Class 3 Completed Outbound Call
        $ivr_class3_inbound_rhyme = $ivrCallInClassBound->where('response1', '1')->where('stakeholder', 'STUDENT')
            ->where('grade', '3')->count();

        $ivr_class3_inbound_story = $ivrCallInClassBound->where('response1', '2')->where('stakeholder', 'STUDENT')
            ->where('grade', '3')->count();

        $ivr_class3_inbound_song = $ivrCallInClassBound->where('response1', '3')->where('stakeholder', 'STUDENT')
            ->where('grade', '3')->count();

        $ivr_class3_inbound_riddle = $ivrCallInClassBound->where('response1', '4')->where('stakeholder', 'STUDENT')
            ->where('grade', '3')->count();


        //Class 4 Completed Outbound Call
        $ivr_class4_inbound_rhyme = $ivrCallInClassBound->where('response1', '1')->where('stakeholder', 'STUDENT')
            ->where('grade', '4')->count();

        $ivr_class4_inbound_story = $ivrCallInClassBound->where('response1', '2')->where('stakeholder', 'STUDENT')
            ->where('grade', '4')->count();

        $ivr_class4_inbound_song = $ivrCallInClassBound->where('response1', '3')->where('stakeholder', 'STUDENT')
            ->where('grade', '4')->count();

        $ivr_class4_inbound_riddle = $ivrCallInClassBound->where('response1', '4')->where('stakeholder', 'STUDENT')
            ->where('grade', '4')->count();


        //Class 5 Completed Outbound Call
        $ivr_class5_inbound_rhyme = $ivrCallInClassBound->where('response1', '1')->where('stakeholder', 'STUDENT')
            ->where('grade', '5')->count();

        $ivr_class5_inbound_story = $ivrCallInClassBound->where('response1', '2')->where('stakeholder', 'STUDENT')
            ->where('grade', '5')->count();

        $ivr_class5_inbound_song = $ivrCallInClassBound->where('response1', '3')->where('stakeholder', 'STUDENT')
            ->where('grade', '5')->count();

        $ivr_class5_inbound_riddle = $ivrCallInClassBound->where('response1', '4')->where('stakeholder', 'STUDENT')
            ->where('grade', '5')->count();


        //unspecified inbound Completed Call

        $ivr_classUnspecified_inbound_rhyme = $ivrCallInClassBound->where('response1', '1')->where('stakeholder', 'STUDENT')
            ->whereNotIn('grade',[1,2,3,4,5])->count();

        $ivr_classUnspecified_inbound_story = $ivrCallInClassBound->where('response1', '2')->where('stakeholder', 'STUDENT')
            ->whereNotIn('grade',[1,2,3,4,5])->count();

        $ivr_classUnspecified_inbound_song = $ivrCallInClassBound->where('response1', '3')->where('stakeholder', 'STUDENT')
            ->whereNotIn('grade',[1,2,3,4,5])->count();

        $ivr_classUnspecified_inbound_riddle = $ivrCallInClassBound->where('response1', '4')->where('stakeholder', 'STUDENT')
            ->whereNotIn('grade',[1,2,3,4,5])->count();


        //Total Call
        $totalCall = $ivrCampaignObject->ivrOutBoundsCallDetails($filterList);

        $total_student = $totalCall->where('stakeholder', 'STUDENT')->count();

        $total_teacher = $totalCall->where('stakeholder', 'TEACHER')->count();

        $total_govt = $totalCall->where('stakeholder', 'GOVT')->count();

        $total_staff = $totalCall->where('stakeholder', 'STAFF')->count();

        $total_unspecified_stakeholder = $totalCall->whereNull('stakeholder')->count();

        $total_student_class1 = $totalCall->where('stakeholder', 'STUDENT')->where('grade', '1')->count();

        $total_student_class2 = $totalCall->where('stakeholder', 'STUDENT')->where('grade', '2')->count();

        $total_student_class3 = $totalCall->where('stakeholder', 'STUDENT')->where('grade', '3')->count();

        $total_student_class4 = $totalCall->where('stakeholder', 'STUDENT')->where('grade', '4')->count();

        $total_student_class5 = $totalCall->where('stakeholder', 'STUDENT')->where('grade', '5')->count();

        $total_student_class_unspecified = $totalCall->where('stakeholder', 'STUDENT')->whereNull('grade')->count();

        //total Received inbound + outbound by stakeholder
        $total_received_call_student = $ivr_call_outbound_rhyme_student + $ivr_call_outbound_story_student +
            $ivr_call_outbound_song_student +$ivr_call_outbound_riddle_student + $ivr_call_inbound_rhyme_student +
            $ivr_call_inbound_story_student + $ivr_call_inbound_song_student + $ivr_call_inbound_riddle_student;

        $total_received_call_teacher = $ivr_call_outbound_rhyme_teacher + $ivr_call_outbound_story_teacher +
            $ivr_call_outbound_song_teacher +$ivr_call_outbound_riddle_teacher + $ivr_call_inbound_rhyme_teacher +
            $ivr_call_inbound_story_teacher + $ivr_call_inbound_song_teacher + $ivr_call_inbound_riddle_teacher;

        $total_received_call_govt = $ivr_call_outbound_rhyme_govt + $ivr_call_outbound_story_govt +
            $ivr_call_outbound_song_govt +$ivr_call_outbound_riddle_govt + $ivr_call_inbound_rhyme_govt +
            $ivr_call_inbound_story_govt + $ivr_call_inbound_song_govt + $ivr_call_inbound_riddle_govt;

        $total_received_call_staff = $ivr_call_outbound_rhyme_staff + $ivr_call_outbound_story_staff +
            $ivr_call_outbound_song_staff +$ivr_call_outbound_riddle_staff + $ivr_call_inbound_rhyme_staff +
            $ivr_call_inbound_story_staff + $ivr_call_inbound_song_staff + $ivr_call_inbound_riddle_staff;

        $total_received_call_unspecified = $ivr_call_outbound_rhyme_unspecified + $ivr_call_outbound_story_unspecified +
            $ivr_call_outbound_song_unspecified +$ivr_call_outbound_riddle_unspecified + $ivr_call_inbound_rhyme_unspecified +
            $ivr_call_inbound_story_unspecified + $ivr_call_inbound_song_unspecified + $ivr_call_inbound_riddle_unspecified;

        //total Received inbound + outbound by grade
        $total_received_call_class1 = $ivr_class1_outbound_rhyme + $ivr_class1_outbound_story + $ivr_class1_outbound_song
            +$ivr_class1_outbound_riddle + $ivr_class1_inbound_rhyme + $ivr_class1_inbound_story + $ivr_class1_inbound_song
            +$ivr_class1_inbound_riddle;

        $total_received_call_class2 = $ivr_class2_outbound_rhyme + $ivr_class2_outbound_story + $ivr_class2_outbound_song
            +$ivr_class2_outbound_riddle + $ivr_class2_inbound_rhyme + $ivr_class2_inbound_story + $ivr_class2_inbound_song
            +$ivr_class2_inbound_riddle;

        $total_received_call_class3 = $ivr_class3_outbound_rhyme + $ivr_class3_outbound_story + $ivr_class3_outbound_song
            +$ivr_class3_outbound_riddle + $ivr_class3_inbound_rhyme + $ivr_class3_inbound_story + $ivr_class3_inbound_song
            +$ivr_class3_inbound_riddle;

        $total_received_call_class4 = $ivr_class4_outbound_rhyme + $ivr_class4_outbound_story + $ivr_class4_outbound_song
            +$ivr_class4_outbound_riddle + $ivr_class4_inbound_rhyme + $ivr_class4_inbound_story + $ivr_class4_inbound_song
            +$ivr_class4_inbound_riddle;

        $total_received_call_class5 = $ivr_class5_outbound_rhyme + $ivr_class5_outbound_story + $ivr_class5_outbound_song
            +$ivr_class5_outbound_riddle + $ivr_class5_inbound_rhyme + $ivr_class5_inbound_story + $ivr_class5_inbound_song
            +$ivr_class5_inbound_riddle;

        $total_received_call_class_unspecified = $ivr_classUnspecified_outbound_rhyme + $ivr_classUnspecified_outbound_story + $ivr_classUnspecified_outbound_song
            +$ivr_classUnspecified_outbound_riddle + $ivr_classUnspecified_inbound_rhyme + $ivr_classUnspecified_inbound_story + $ivr_classUnspecified_inbound_song
            +$ivr_classUnspecified_inbound_riddle;


        ($request->gender) ? $gender = $request->gender : $gender = 'All';
        $dateFrom = date('d M Y', strtotime($request->fromDate));
        $dateTo = date('d M Y', strtotime($request->toDate));

        if ($request->district) $location = $request->district;
        else if ($request->area) $location = $request->area;
        else if ($request->division) $location = $request->division;
        else $location = 'All';

        $data = [
            //outbound
            'ivr_call_outbound_rhyme_student' => $ivr_call_outbound_rhyme_student,
            'ivr_call_outbound_story_student' => $ivr_call_outbound_story_student,
            'ivr_call_outbound_song_student' => $ivr_call_outbound_song_student,
            'ivr_call_outbound_riddle_student' => $ivr_call_outbound_riddle_student,

            'ivr_call_outbound_rhyme_teacher' => $ivr_call_outbound_rhyme_teacher,
            'ivr_call_outbound_story_teacher' => $ivr_call_outbound_story_teacher,
            'ivr_call_outbound_song_teacher' => $ivr_call_outbound_song_teacher,
            'ivr_call_outbound_riddle_teacher' => $ivr_call_outbound_riddle_teacher,

            'ivr_call_outbound_rhyme_govt' => $ivr_call_outbound_rhyme_govt,
            'ivr_call_outbound_story_govt' => $ivr_call_outbound_story_govt,
            'ivr_call_outbound_song_govt' => $ivr_call_outbound_song_govt,
            'ivr_call_outbound_riddle_govt' => $ivr_call_outbound_riddle_govt,

            'ivr_call_outbound_rhyme_staff' => $ivr_call_outbound_rhyme_staff,
            'ivr_call_outbound_story_staff' => $ivr_call_outbound_story_staff,
            'ivr_call_outbound_song_staff' => $ivr_call_outbound_song_staff,
            'ivr_call_outbound_riddle_staff' => $ivr_call_outbound_riddle_staff,

            'ivr_call_outbound_rhyme_unspecified' => $ivr_call_outbound_rhyme_unspecified,
            'ivr_call_outbound_story_unspecified' => $ivr_call_outbound_story_unspecified,
            'ivr_call_outbound_song_unspecified' => $ivr_call_outbound_song_unspecified,
            'ivr_call_outbound_riddle_unspecified' => $ivr_call_outbound_riddle_unspecified,

            //inbound
            'ivr_call_inbound_rhyme_student' => $ivr_call_inbound_rhyme_student,
            'ivr_call_inbound_story_student' => $ivr_call_inbound_story_student,
            'ivr_call_inbound_song_student' => $ivr_call_inbound_song_student,
            'ivr_call_inbound_riddle_student' => $ivr_call_inbound_riddle_student,

            'ivr_call_inbound_rhyme_teacher' => $ivr_call_inbound_rhyme_teacher,
            'ivr_call_inbound_story_teacher' => $ivr_call_inbound_story_teacher,
            'ivr_call_inbound_song_teacher' => $ivr_call_inbound_song_teacher,
            'ivr_call_inbound_riddle_teacher' => $ivr_call_inbound_riddle_teacher,

            'ivr_call_inbound_rhyme_govt' => $ivr_call_inbound_rhyme_govt,
            'ivr_call_inbound_story_govt' => $ivr_call_inbound_story_govt,
            'ivr_call_inbound_song_govt' => $ivr_call_inbound_song_govt,
            'ivr_call_inbound_riddle_govt' => $ivr_call_inbound_riddle_govt,

            'ivr_call_inbound_rhyme_staff' => $ivr_call_inbound_rhyme_staff,
            'ivr_call_inbound_story_staff' => $ivr_call_inbound_story_staff,
            'ivr_call_inbound_song_staff' => $ivr_call_inbound_song_staff,
            'ivr_call_inbound_riddle_staff' => $ivr_call_inbound_riddle_staff,

            'ivr_call_inbound_rhyme_unspecified' => $ivr_call_inbound_rhyme_unspecified,
            'ivr_call_inbound_story_unspecified' => $ivr_call_inbound_story_unspecified,
            'ivr_call_inbound_song_unspecified' => $ivr_call_inbound_song_unspecified,
            'ivr_call_inbound_riddle_unspecified' => $ivr_call_inbound_riddle_unspecified,

            //sms stakeholder
            'ivr_sms_student' => $ivr_sms_student,
            'ivr_sms_teacher' => $ivr_sms_teacher,
            'ivr_sms_govt' => $ivr_sms_govt,
            'ivr_sms_staff' => $ivr_sms_staff,
            'ivr_sms_unspecified' => $ivr_sms_unspecified,

            //student outbound
            'ivr_class1_outbound_rhyme' => $ivr_class1_outbound_rhyme,
            'ivr_class1_outbound_story' => $ivr_class1_outbound_story,
            'ivr_class1_outbound_song' => $ivr_class1_outbound_song,
            'ivr_class1_outbound_riddle' => $ivr_class1_outbound_riddle,

            'ivr_class2_outbound_rhyme' => $ivr_class2_outbound_rhyme,
            'ivr_class2_outbound_story' => $ivr_class2_outbound_story,
            'ivr_class2_outbound_song' => $ivr_class2_outbound_song,
            'ivr_class2_outbound_riddle' => $ivr_class2_outbound_riddle,

            'ivr_class3_outbound_rhyme' => $ivr_class3_outbound_rhyme,
            'ivr_class3_outbound_story' => $ivr_class3_outbound_story,
            'ivr_class3_outbound_song' => $ivr_class3_outbound_song,
            'ivr_class3_outbound_riddle' => $ivr_class3_outbound_riddle,

            'ivr_class4_outbound_rhyme' => $ivr_class4_outbound_rhyme,
            'ivr_class4_outbound_story' => $ivr_class4_outbound_story,
            'ivr_class4_outbound_song' => $ivr_class4_outbound_song,
            'ivr_class4_outbound_riddle' => $ivr_class4_outbound_riddle,

            'ivr_class5_outbound_rhyme' => $ivr_class5_outbound_rhyme,
            'ivr_class5_outbound_story' => $ivr_class5_outbound_story,
            'ivr_class5_outbound_song' => $ivr_class5_outbound_song,
            'ivr_class5_outbound_riddle' => $ivr_class5_outbound_riddle,

            'ivr_classUnspecified_outbound_rhyme' => $ivr_classUnspecified_outbound_rhyme,
            'ivr_classUnspecified_outbound_story' => $ivr_classUnspecified_outbound_story,
            'ivr_classUnspecified_outbound_song' => $ivr_classUnspecified_outbound_song,
            'ivr_classUnspecified_outbound_riddle' => $ivr_classUnspecified_outbound_riddle,


            //student inbound
            'ivr_class1_inbound_rhyme' => $ivr_class1_inbound_rhyme,
            'ivr_class1_inbound_story' => $ivr_class1_inbound_story,
            'ivr_class1_inbound_song' => $ivr_class1_inbound_song,
            'ivr_class1_inbound_riddle' => $ivr_class1_inbound_riddle,

            'ivr_class2_inbound_rhyme' => $ivr_class2_inbound_rhyme,
            'ivr_class2_inbound_story' => $ivr_class2_inbound_story,
            'ivr_class2_inbound_song' => $ivr_class2_inbound_song,
            'ivr_class2_inbound_riddle' => $ivr_class2_inbound_riddle,

            'ivr_class3_inbound_rhyme' => $ivr_class3_inbound_rhyme,
            'ivr_class3_inbound_story' => $ivr_class3_inbound_story,
            'ivr_class3_inbound_song' => $ivr_class3_inbound_song,
            'ivr_class3_inbound_riddle' => $ivr_class3_inbound_riddle,

            'ivr_class4_inbound_rhyme' => $ivr_class4_inbound_rhyme,
            'ivr_class4_inbound_story' => $ivr_class4_inbound_story,
            'ivr_class4_inbound_song' => $ivr_class4_inbound_song,
            'ivr_class4_inbound_riddle' => $ivr_class4_inbound_riddle,

            'ivr_class5_inbound_rhyme' => $ivr_class5_inbound_rhyme,
            'ivr_class5_inbound_story' => $ivr_class5_inbound_story,
            'ivr_class5_inbound_song' => $ivr_class5_inbound_song,
            'ivr_class5_inbound_riddle' => $ivr_class5_inbound_riddle,

            'ivr_classUnspecified_inbound_rhyme' => $ivr_classUnspecified_inbound_rhyme,
            'ivr_classUnspecified_inbound_story' => $ivr_classUnspecified_inbound_story,
            'ivr_classUnspecified_inbound_song' => $ivr_classUnspecified_inbound_song,
            'ivr_classUnspecified_inbound_riddle' => $ivr_classUnspecified_inbound_riddle,

            //sms student
            'ivr_class1_sms_student' => $ivr_class1_sms_student,
            'ivr_class2_sms_student' => $ivr_class2_sms_student,
            'ivr_class3_sms_student' => $ivr_class3_sms_student,
            'ivr_class4_sms_student' => $ivr_class4_sms_student,
            'ivr_class5_sms_student' => $ivr_class5_sms_student,
            'ivr_unspecified_sms_student' => $ivr_unspecified_sms_student,

            //total users of stakeholder
            'total_student' => $total_student,
            'total_teacher' => $total_teacher,
            'total_govt' => $total_govt,
            'total_staff' => $total_staff,
            'total_unspecified_stakeholder' => $total_unspecified_stakeholder,

            //total stakeholder received call
            'total_received_call_student' => $total_received_call_student,
            'total_received_call_teacher' => $total_received_call_teacher,
            'total_received_call_govt'    => $total_received_call_govt,
            'total_received_call_staff'   => $total_received_call_staff,
            'total_received_call_unspecified' => $total_received_call_unspecified,

            //total grade received call
            'total_received_call_class1'=>$total_received_call_class1,
            'total_received_call_class2'=>$total_received_call_class2,
            'total_received_call_class3'=>$total_received_call_class3,
            'total_received_call_class4'=>$total_received_call_class4,
            'total_received_call_class5'=>$total_received_call_class5,
            'total_received_call_class_unspecified'=>$total_received_call_class_unspecified,

            //total users of student
            'total_student_class1' => $total_student_class1,
            'total_student_class2' => $total_student_class2,
            'total_student_class3' => $total_student_class3,
            'total_student_class4' => $total_student_class4,
            'total_student_class5' => $total_student_class5,
            'total_student_class_unspecified' => $total_student_class_unspecified,

            //target Audience stakeholder
            'target_audience_student' => $ivrTargetAudiences['studentRecordTotal'],
            'target_audience_teacher' => $ivrTargetAudiences['teacherRecordTotal'],
            'target_audience_govt' => $ivrTargetAudiences['govtRecordTotal'],
            'target_audience_staff' => $ivrTargetAudiences['staffRecordTotal'],
            'target_audience_other' => $ivrTargetAudiences['unspecifiedRecordTotal'],

            //target Audience grade
            'target_audience_class1' => $ivrTargetAudiencesGrade['class1RecordTotal'],
            'target_audience_class2' => $ivrTargetAudiencesGrade['class2RecordTotal'],
            'target_audience_class3' => $ivrTargetAudiencesGrade['class3RecordTotal'],
            'target_audience_class4' => $ivrTargetAudiencesGrade['class4RecordTotal'],
            'target_audience_class5' => $ivrTargetAudiencesGrade['class5RecordTotal'],
            'target_audience_unspecified' => $ivrTargetAudiencesGrade['classUnspecifiedRecordTotal'],


            'gender' => $gender,
            'location' => $location,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo


        ];

        return Redirect::back()->with(['data' => $data]);
    }

    public function usageReportGeneratePDF(Request $request)
    {

        $data = [
            'title' => 'IVR Call Usages Report',
            'ivr_call_outbound_rhyme_student' => $request->ivr_call_outbound_rhyme_student,
            'ivr_call_outbound_story_student' => $request->ivr_call_outbound_story_student,
            'ivr_call_outbound_song_student' => $request->ivr_call_outbound_song_student,
            'ivr_call_outbound_riddle_student' => $request->ivr_call_outbound_riddle_student,

            'ivr_call_outbound_rhyme_teacher' => $request->ivr_call_outbound_rhyme_teacher,
            'ivr_call_outbound_story_teacher' => $request->ivr_call_outbound_story_teacher,
            'ivr_call_outbound_song_teacher' => $request->ivr_call_outbound_song_teacher,
            'ivr_call_outbound_riddle_teacher' => $request->ivr_call_outbound_riddle_teacher,

            'ivr_call_outbound_rhyme_govt' => $request->ivr_call_outbound_rhyme_govt,
            'ivr_call_outbound_story_govt' => $request->ivr_call_outbound_story_govt,
            'ivr_call_outbound_song_govt' => $request->ivr_call_outbound_song_govt,
            'ivr_call_outbound_riddle_govt' => $request->ivr_call_outbound_riddle_govt,

            'ivr_call_outbound_rhyme_staff' => $request->ivr_call_outbound_rhyme_staff,
            'ivr_call_outbound_story_staff' => $request->ivr_call_outbound_story_staff,
            'ivr_call_outbound_song_staff' => $request->ivr_call_outbound_song_staff,
            'ivr_call_outbound_riddle_staff' => $request->ivr_call_outbound_riddle_staff,

            'ivr_call_outbound_rhyme_unspecified' => $request->ivr_call_outbound_rhyme_unspecified,
            'ivr_call_outbound_story_unspecified' => $request->ivr_call_outbound_story_unspecified,
            'ivr_call_outbound_song_unspecified' => $request->ivr_call_outbound_song_unspecified,
            'ivr_call_outbound_riddle_unspecified' => $request->ivr_call_outbound_riddle_unspecified,

            //inbound
            'ivr_call_inbound_rhyme_student' => $request->ivr_call_inbound_rhyme_student,
            'ivr_call_inbound_story_student' => $request->ivr_call_inbound_story_student,
            'ivr_call_inbound_song_student' => $request->ivr_call_inbound_song_student,
            'ivr_call_inbound_riddle_student' => $request->ivr_call_inbound_riddle_student,

            'ivr_call_inbound_rhyme_teacher' => $request->ivr_call_inbound_rhyme_teacher,
            'ivr_call_inbound_story_teacher' => $request->ivr_call_inbound_story_teacher,
            'ivr_call_inbound_song_teacher' => $request->ivr_call_inbound_song_teacher,
            'ivr_call_inbound_riddle_teacher' => $request->ivr_call_inbound_riddle_teacher,

            'ivr_call_inbound_rhyme_govt' => $request->ivr_call_inbound_rhyme_govt,
            'ivr_call_inbound_story_govt' => $request->ivr_call_inbound_story_govt,
            'ivr_call_inbound_song_govt' => $request->ivr_call_inbound_song_govt,
            'ivr_call_inbound_riddle_govt' => $request->ivr_call_inbound_riddle_govt,

            'ivr_call_inbound_rhyme_staff' => $request->ivr_call_inbound_rhyme_staff,
            'ivr_call_inbound_story_staff' => $request->ivr_call_inbound_story_staff,
            'ivr_call_inbound_song_staff' => $request->ivr_call_inbound_song_staff,
            'ivr_call_inbound_riddle_staff' => $request->ivr_call_inbound_riddle_staff,

            'ivr_call_inbound_rhyme_unspecified' => $request->ivr_call_inbound_rhyme_unspecified,
            'ivr_call_inbound_story_unspecified' => $request->ivr_call_inbound_story_unspecified,
            'ivr_call_inbound_song_unspecified' => $request->ivr_call_inbound_song_unspecified,
            'ivr_call_inbound_riddle_unspecified' => $request->ivr_call_inbound_riddle_unspecified,

            //sms stakeholder
            'ivr_sms_student' => $request->ivr_sms_student,
            'ivr_sms_teacher' => $request->ivr_sms_teacher,
            'ivr_sms_govt' => $request->ivr_sms_govt,
            'ivr_sms_staff' => $request->ivr_sms_staff,
            'ivr_sms_unspecified' => $request->ivr_sms_unspecified,

            //student outbound
            'ivr_class1_outbound_rhyme' => $request->ivr_class1_outbound_rhyme,
            'ivr_class1_outbound_story' => $request->ivr_class1_outbound_story,
            'ivr_class1_outbound_song' => $request->ivr_class1_outbound_song,
            'ivr_class1_outbound_riddle' => $request->ivr_class1_outbound_riddle,

            'ivr_class2_outbound_rhyme' => $request->ivr_class2_outbound_rhyme,
            'ivr_class2_outbound_story' => $request->ivr_class2_outbound_story,
            'ivr_class2_outbound_song' => $request->ivr_class2_outbound_song,
            'ivr_class2_outbound_riddle' => $request->ivr_class2_outbound_riddle,

            'ivr_class3_outbound_rhyme' => $request->ivr_class3_outbound_rhyme,
            'ivr_class3_outbound_story' => $request->ivr_class3_outbound_story,
            'ivr_class3_outbound_song' => $request->ivr_class3_outbound_song,
            'ivr_class3_outbound_riddle' => $request->ivr_class3_outbound_riddle,

            'ivr_class4_outbound_rhyme' => $request->ivr_class4_outbound_rhyme,
            'ivr_class4_outbound_story' => $request->ivr_class4_outbound_story,
            'ivr_class4_outbound_song' => $request->ivr_class4_outbound_song,
            'ivr_class4_outbound_riddle' => $request->ivr_class4_outbound_riddle,

            'ivr_class5_outbound_rhyme' => $request->ivr_class5_outbound_rhyme,
            'ivr_class5_outbound_story' => $request->ivr_class5_outbound_story,
            'ivr_class5_outbound_song' => $request->ivr_class5_outbound_song,
            'ivr_class5_outbound_riddle' => $request->ivr_class5_outbound_riddle,

            'ivr_classUnspecified_outbound_rhyme' => $request->ivr_classUnspecified_outbound_rhyme,
            'ivr_classUnspecified_outbound_story' => $request->ivr_classUnspecified_outbound_story,
            'ivr_classUnspecified_outbound_song' => $request->ivr_classUnspecified_outbound_song,
            'ivr_classUnspecified_outbound_riddle' => $request->ivr_classUnspecified_outbound_riddle,

            //student inbound
            'ivr_class1_inbound_rhyme' => $request->ivr_class1_inbound_rhyme,
            'ivr_class1_inbound_story' => $request->ivr_class1_inbound_story,
            'ivr_class1_inbound_song' => $request->ivr_class1_inbound_song,
            'ivr_class1_inbound_riddle' => $request->ivr_class1_inbound_riddle,

            'ivr_class2_inbound_rhyme' => $request->ivr_class2_inbound_rhyme,
            'ivr_class2_inbound_story' => $request->ivr_class2_inbound_story,
            'ivr_class2_inbound_song' => $request->ivr_class2_inbound_song,
            'ivr_class2_inbound_riddle' => $request->ivr_class2_inbound_riddle,

            'ivr_class3_inbound_rhyme' => $request->ivr_class3_inbound_rhyme,
            'ivr_class3_inbound_story' => $request->ivr_class3_inbound_story,
            'ivr_class3_inbound_song' => $request->ivr_class3_inbound_song,
            'ivr_class3_inbound_riddle' => $request->ivr_class3_inbound_riddle,

            'ivr_class4_inbound_rhyme' => $request->ivr_class4_inbound_rhyme,
            'ivr_class4_inbound_story' => $request->ivr_class4_inbound_story,
            'ivr_class4_inbound_song' => $request->ivr_class4_inbound_song,
            'ivr_class4_inbound_riddle' => $request->ivr_class4_inbound_riddle,

            'ivr_class5_inbound_rhyme' => $request->ivr_class5_inbound_rhyme,
            'ivr_class5_inbound_story' => $request->ivr_class5_inbound_story,
            'ivr_class5_inbound_song' => $request->ivr_class5_inbound_song,
            'ivr_class5_inbound_riddle' => $request->ivr_class5_inbound_riddle,

            'ivr_classUnspecified_inbound_rhyme' => $request->ivr_classUnspecified_inbound_rhyme,
            'ivr_classUnspecified_inbound_story' => $request->ivr_classUnspecified_inbound_story,
            'ivr_classUnspecified_inbound_song' => $request->ivr_classUnspecified_inbound_song,
            'ivr_classUnspecified_inbound_riddle' => $request->ivr_classUnspecified_inbound_riddle,

            //sms student
            'ivr_class1_sms_student' => $request->ivr_class1_sms_student,
            'ivr_class2_sms_student' => $request->ivr_class2_sms_student,
            'ivr_class3_sms_student' => $request->ivr_class3_sms_student,
            'ivr_class4_sms_student' => $request->ivr_class4_sms_student,
            'ivr_class5_sms_student' => $request->ivr_class5_sms_student,
            'ivr_unspecified_sms_student' => $request->ivr_unspecified_sms_student,


            //total stakeholder received call
            'total_received_call_student' => $request->total_received_call_student,
            'total_received_call_teacher' => $request->total_received_call_teacher,
            'total_received_call_govt'    => $request->total_received_call_govt,
            'total_received_call_staff'   => $request->total_received_call_staff,
            'total_received_call_unspecified' => $request->total_received_call_unspecified,

            //total grade received call
            'total_received_call_class1'=>$request->total_received_call_class1,
            'total_received_call_class2'=>$request->total_received_call_class2,
            'total_received_call_class3'=>$request->total_received_call_class3,
            'total_received_call_class4'=>$request->total_received_call_class4,
            'total_received_call_class5'=>$request->total_received_call_class5,
            'total_received_call_class_unspecified'=>$request->total_received_call_class_unspecified,

            //total users of stakeholder
            'total_student' => $request->total_student,
            'total_teacher' => $request->total_teacher,
            'total_govt' => $request->total_govt,
            'total_staff' => $request->total_staff,
            'total_unspecified_stakeholder' => $request->total_unspecified_stakeholder,

            //total users of student
            'total_student_class1' => $request->total_student_class1,
            'total_student_class2' => $request->total_student_class2,
            'total_student_class3' => $request->total_student_class3,
            'total_student_class4' => $request->total_student_class4,
            'total_student_class5' => $request->total_student_class5,
            'total_student_class_unspecified' => $request->total_student_class_unspecified,

            //target Audience stakeholder
            'target_audience_student' => $request->target_audience_student,
            'target_audience_teacher' => $request->target_audience_teacher,
            'target_audience_govt' => $request->target_audience_govt,
            'target_audience_staff' => $request->target_audience_staff,
            'target_audience_other' => $request->target_audience_other,

            //target Audience grade
            'target_audience_class1' => $request->target_audience_class1,
            'target_audience_class2' => $request->target_audience_class2,
            'target_audience_class3' => $request->target_audience_class3,
            'target_audience_class4' => $request->target_audience_class4,
            'target_audience_class5' => $request->target_audience_class5,
            'target_audience_unspecified' => $request->target_audience_unspecified,

            'gender' => $request->gender,
            'location' => $request->location,
            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo
        ];
        $pdf = PDF::loadView('backend.reports.ivr.usage_report.usage_report_pdf', $data);
        return $pdf->download('IVR Call Usages Report.pdf');

    }

    public function callAnalysisReport()
    {

        $area = Contact::groupBy('area')
            ->select('area')->orderBy('area', 'DESC')->get();

        $district = Contact::groupBy('district')
            ->select('district')->orderBy('district', 'DESC')->get();

        $division = Contact::groupBy('division')
            ->select('division')->orderBy('division', 'DESC')->get();

        $data = [
            'title' => 'Ivr Call Analysis Report',
            'area' => $area,
            'district' => $district,
            'division' => $division
        ];

        return view('backend.reports.ivr.call_analysis_report.call_analysis_report', $data);
    }

    public function requestCallAnalysisReport(Request $request)
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

        $ivrCampaignObject = new IvrCampaignHelper;

        // IVR Target Audiences Data Collection
        $ivrTargetAudiences = $ivrCampaignObject->targetAudienceStakeholderWise($filterList);

        // IVR Outbounds Call All Data Collection
        $ivrOutboundCallDetails = $ivrCampaignObject->ivrOutBoundsCallDetails($filterList);


        // IVR Inbounds Call All Data Collection
        $ivrIntboundCallDetails = $ivrCampaignObject->ivrInBoundsCallDetails($filterList);

        // Staff Section
        $staffTargetAudiences = $ivrTargetAudiences['staffRecordTotal'];
        $staffTotalCalls = $ivrOutboundCallDetails->where('stakeholder', 'STAFF')->where('called', 'Yes')->count();
        $staffTotalCallRecived = $ivrOutboundCallDetails->where('stakeholder', 'STAFF')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->count();
        $staffTotalCallCompleted = $ivrOutboundCallDetails->where('stakeholder', 'STAFF')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('response1', '!=', '')->where('response2', '!=', '')->count();
        $staffTotalCallFailed = $ivrOutboundCallDetails->where('stakeholder', 'STAFF')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('duration', '<', 30)->count();
        $staffTotalInboundCall = $ivrIntboundCallDetails->where('stakeholder', 'STAFF')->where('uniqueid', '!=', '')->count();

        // Teacher Section
        $teacherTargetAudiences = $ivrTargetAudiences['teacherRecordTotal'];
        $teacherTotalCalls = $ivrOutboundCallDetails->where('stakeholder', 'TEACHER')->where('called', 'Yes')->count();
        $teacherTotalCallRecived = $ivrOutboundCallDetails->where('stakeholder', 'TEACHER')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->count();
        $teacherTotalCallCompleted = $ivrOutboundCallDetails->where('stakeholder', 'TEACHER')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('response1', '!=', '')->where('response2', '!=', '')->count();
        $teacherTotalCallFailed = $ivrOutboundCallDetails->where('stakeholder', 'TEACHER')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('duration', '<', 30)->count();
        $teacherTotalInboundCall = $ivrIntboundCallDetails->where('stakeholder', 'TEACHER')->where('uniqueid', '!=', '')->count();

        // Govt Section
        $govtTargetAudiences = $ivrTargetAudiences['govtRecordTotal'];
        $govtTotalCalls = $ivrOutboundCallDetails->where('stakeholder', 'GOVT')->where('called', 'Yes')->count();
        $govtTotalCallRecived = $ivrOutboundCallDetails->where('stakeholder', 'GOVT')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->count();
        $govtTotalCallCompleted = $ivrOutboundCallDetails->where('stakeholder', 'GOVT')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('response1', '!=', '')->where('response2', '!=', '')->count();
        $govtTotalCallFailed = $ivrOutboundCallDetails->where('stakeholder', 'GOVT')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('duration', '<', 30)->count();
        $govtTotalInboundCall = $ivrIntboundCallDetails->where('stakeholder', 'GOVT')->where('uniqueid', '!=', '')->count();

        // Student Section
        $studentTargetAudiences = $ivrTargetAudiences['studentRecordTotal'];
        $studentTotalCalls = $ivrOutboundCallDetails->where('stakeholder', 'STUDENT')->where('called', 'Yes')->count();
        $studentTotalCallRecived = $ivrOutboundCallDetails->where('stakeholder', 'STUDENT')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->count();
        $studentTotalCallCompleted = $ivrOutboundCallDetails->where('stakeholder', 'STUDENT')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('response1', '!=', '')->where('response2', '!=', '')->count();
        $studentTotalCallFailed = $ivrOutboundCallDetails->where('stakeholder', 'STUDENT')->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('duration', '<', 30)->count();
        $studentTotalInboundCall = $ivrIntboundCallDetails->where('stakeholder', 'STUDENT')->where('uniqueid', '!=', '')->count();

        // Unspecified Section
        $upspecifiedTargetAudiences = $ivrTargetAudiences['unspecifiedRecordTotal'];
        $upspecifiedTotalCalls = $ivrOutboundCallDetails->where('stakeholder', null)->where('called', 'Yes')->count();
        $upspecifiedTotalCallRecived = $ivrOutboundCallDetails->where('stakeholder', null)->where('called', 'Yes')->where('uniqueid', '!=', NULL)->count();
        $upspecifiedTotalCallCompleted = $ivrOutboundCallDetails->where('stakeholder', null)->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('response1', '!=', '')->where('response2', '!=', '')->count();
        $upspecifiedTotalCallFailed = $ivrOutboundCallDetails->where('stakeholder', null)->where('called', 'Yes')->where('uniqueid', '!=', NULL)->where('duration', '<', 30)->count();
        $upspecifiedTotalInboundCall = $ivrIntboundCallDetails->where('stakeholder', null)->where('uniqueid', '!=', '')->count();


        ($request->gender) ? $gender = $request->gender : $gender = 'All';
        $dateFrom = date('d M Y', strtotime($request->fromDate));
        $dateTo = date('d M Y', strtotime($request->toDate));

        if ($request->district) $location = $request->district;
        else if ($request->area) $location = $request->area;
        else if ($request->division) $location = $request->division;
        else $location = 'All';


        $data = [

            'staffTargetAudiences' => $staffTargetAudiences,
            'staffTotalCalled' => $staffTotalCalls,
            'staffTotalCallRecived' => $staffTotalCallRecived,
            'staffTotalCallCompleted' => $staffTotalCallCompleted,
            'staffTotalCallFailed' => $staffTotalCallFailed,
            'staffTotalInboundCalled' => $staffTotalInboundCall,

            'teacherTargetAudiences' => $teacherTargetAudiences,
            'teacherTotalCalled' => $teacherTotalCalls,
            'teacherTotalCallRecived' => $teacherTotalCallRecived,
            'teacherTotalCallCompleted' => $teacherTotalCallCompleted,
            'teacherTotalCallFailed' => $teacherTotalCallFailed,
            'teacherTotalInboundCalled' => $teacherTotalInboundCall,

            'govtTargetAudiences' => $govtTargetAudiences,
            'govtTotalCalled' => $govtTotalCalls,
            'govtTotalCallRecived' => $govtTotalCallRecived,
            'govtTotalCallCompleted' => $govtTotalCallCompleted,
            'govtTotalCallFailed' => $govtTotalCallFailed,
            'govtTotalInboundCalled' => $govtTotalInboundCall,

            'studentTargetAudiences' => $studentTargetAudiences,
            'studentTotalCalled' => $studentTotalCalls,
            'studentTotalCallRecived' => $studentTotalCallRecived,
            'studentTotalCallCompleted' => $studentTotalCallCompleted,
            'studentTotalCallFailed' => $studentTotalCallFailed,
            'studentTotalInboundCall' => $studentTotalInboundCall,

            'upspecifiedTargetAudiences' => $upspecifiedTargetAudiences,
            'upspecifiedTotalCalled' => $upspecifiedTotalCalls,
            'upspecifiedTotalCallRecived' => $upspecifiedTotalCallRecived,
            'upspecifiedTotalCallCompleted' => $upspecifiedTotalCallCompleted,
            'upspecifiedTotalCallFailed' => $upspecifiedTotalCallFailed,
            'upspecifiedTotalInboundCall' => $upspecifiedTotalInboundCall,

            'gender' => $gender,
            'location' => $location,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo

        ];

        return Redirect::back()->with(['data' => $data]);
    }

    public function callAnalysisReportGeneratePDF(Request $request)
    {
        $data = [

            'title' => 'Ivr Call Analysis Report',

            'staffTargetAudiences' => $request->staffTargetAudiences,
            'staffTotalCalled' => $request->staffTotalCalled,
            'staffTotalCallRecived' => $request->staffTotalCallRecived,
            'staffTotalCallCompleted' => $request->staffTotalCallCompleted,
            'staffTotalCallFailed' => $request->staffTotalCallFailed,
            'staffTotalInboundCalled' => $request->staffTotalInboundCalled,

            'teacherTargetAudiences' => $request->teacherTargetAudiences,
            'teacherTotalCalled' => $request->teacherTotalCalled,
            'teacherTotalCallRecived' => $request->teacherTotalCallRecived,
            'teacherTotalCallCompleted' => $request->teacherTotalCallCompleted,
            'teacherTotalCallFailed' => $request->teacherTotalCallFailed,
            'teacherTotalInboundCalled' => $request->teacherTotalInboundCalled,

            'govtTargetAudiences' => $request->govtTargetAudiences,
            'govtTotalCalled' => $request->govtTotalCalled,
            'govtTotalCallRecived' => $request->govtTotalCallRecived,
            'govtTotalCallCompleted' => $request->govtTotalCallCompleted,
            'govtTotalCallFailed' => $request->govtTotalCallFailed,
            'govtTotalInboundCalled' => $request->govtTotalInboundCalled,

            'studentTargetAudiences' => $request->studentTargetAudiences,
            'studentTotalCalled' => $request->studentTotalCalled,
            'studentTotalCallRecived' => $request->studentTotalCallRecived,
            'studentTotalCallCompleted' => $request->studentTotalCallCompleted,
            'studentTotalCallFailed' => $request->studentTotalCallFailed,
            'studentTotalInboundCall' => $request->studentTotalInboundCall,

            'upspecifiedTargetAudiences' => $request->upspecifiedTargetAudiences,
            'upspecifiedTotalCalled' => $request->upspecifiedTotalCalled,
            'upspecifiedTotalCallRecived' => $request->upspecifiedTotalCallRecived,
            'upspecifiedTotalCallCompleted' => $request->upspecifiedTotalCallCompleted,
            'upspecifiedTotalCallFailed' => $request->upspecifiedTotalCallFailed,
            'upspecifiedTotalInboundCall' => $request->upspecifiedTotalInboundCall,


            'gender' => $request->gender,
            'location' => $request->location,
            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo

        ];

        $pdf = PDF::loadView('backend.reports.ivr.call_analysis_report.call_analysis_report_pdf', $data);
        return $pdf->download('Ivr Call Analysis Report.pdf');

    }

    public function contentPlayReport()
    {
        $data = [
            'title' => 'Ivr Content Play Report'
        ];

        return view('backend.reports.ivr.content_play_report.content_play_report', $data);
    }

    public function requestContentPlayReport(Request $request)
    {
        $startDate = $request->fromDate;
        $endDate = $request->toDate;

        // Story Records
        $storyParent = IvrSteps::where('title', 'Golpo List')->whereNull('parent_id')->first('id');
        $ivrStories = IvrSteps::withSum(
            ['ivrClipPlayLogs as log_count' => function ($query) use ($startDate, $endDate) {
                $query->where('play_date', '>=', $startDate);
                $query->where('play_date', '<=', $endDate);
            }],
            'total_play_count'
        )
            ->where('parent_id', $storyParent->id)
            ->get();

        // Riddle Records
        $riddleParent = IvrSteps::where('title', 'Dhadha List')->whereNull('parent_id')->first('id');
        $ivrRiddles = IvrSteps::withSum(
            ['ivrClipPlayLogs as log_count' => function ($query) use ($startDate, $endDate) {
                $query->where('play_date', '>=', $startDate);
                $query->where('play_date', '<=', $endDate);
            }],
            'total_play_count'
        )
            ->where('parent_id', $riddleParent->id)
            ->get();

        // Poem Records
        $poemParent = IvrSteps::where('title', 'Kobita List')->whereNull('parent_id')->first('id');
        $ivrPoems = IvrSteps::withSum(
            ['ivrClipPlayLogs as log_count' => function ($query) use ($startDate, $endDate) {
                $query->where('play_date', '>=', $startDate);
                $query->where('play_date', '<=', $endDate);
            }],
            'total_play_count'
        )
            ->where('parent_id', $poemParent->id)
            ->get();

        // Song Records
        $songParent = IvrSteps::where('title', 'Gaan List')->whereNull('parent_id')->first('id');
        $ivrSongs = IvrSteps::withSum(
            ['ivrClipPlayLogs as log_count' => function ($query) use ($startDate, $endDate) {
                $query->where('play_date', '>=', $startDate);
                $query->where('play_date', '<=', $endDate);
            }],
            'total_play_count'
        )
            ->where('parent_id', $songParent->id)
            ->get();

        $dateFrom = date('d M Y', strtotime($request->fromDate));
        $dateTo = date('d M Y', strtotime($request->toDate));

        $data = [

            'ivrStories' => $ivrStories,
            'ivrRiddles' => $ivrRiddles,
            'ivrPoems' => $ivrPoems,
            'ivrSongs' => $ivrSongs,

            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo
        ];

        return Redirect::back()->with(['data' => $data]);
    }

    public function contentPlayReportGeneratePDF(Request $request)
    {
        $data = [

            'title' => 'Ivr Most Content Play Report',

            'ivrStories' => json_decode($request->ivrStories),
            'ivrRiddles' => json_decode($request->ivrRiddles),
            'ivrPoems' => json_decode($request->ivrPoems),
            'ivrSongs' => json_decode($request->ivrSongs),

            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo
        ];

        $pdf = PDF::loadView('backend.reports.ivr.content_play_report.content_play_report_pdf', $data);
        return $pdf->download('Ivr Content Play Report.pdf');
    }

    public function mostFavouritecontentPlayReport()
    {
        $data = [
            'title' => 'Ivr Most Favourite Content Play Report'
        ];

        return view('backend.reports.ivr.most_fav_content_play_report.fav_content_play_report', $data);
    }

    public function requestMostFavouriteContentPlayReport(Request $request)
    {
        $startDate = $request->fromDate;
        $endDate = $request->toDate;

        // Poem Records
        $poemIds = DB::table('ivr_steps as t1')->Join('ivr_steps as t2', 't1.id', 't2.parent_id')
            ->whereNull('t1.parent_id')
            ->where('t1.title', 'Kobita List')
            ->pluck('t2.id');

        $ivrTotalPoem = IvrClipPlayLog::whereIn('ivr_step_id', $poemIds)
            ->where('play_date', '>=', $startDate)
            ->where('play_date', '<=', $endDate)
            ->sum('total_play_count');

        $ivrPoemData = DB::table('ivr_clip_play_logs as t1')
            ->join('ivr_steps as t2', 't2.id', 't1.ivr_step_id')
            ->select(DB::raw('SUM(t1.total_play_count) AS total_log'), 't2.id', 't2.title', 't1.key_press_1', 't1.key_press_2')
            ->whereIn('t1.ivr_step_id', $poemIds)
            ->where('t1.play_date', '>=', $startDate)
            ->where('t1.play_date', '<=', $endDate)
            ->groupBy('t1.ivr_step_id')
            ->orderBy('total_log', 'DESC')
            ->orderBy('t1.ivr_step_id', 'DESC')
            ->limit(1)
            ->get();

        $ivrPoem = [
            'total' => $ivrTotalPoem,
            'name' => (count($ivrPoemData) != 0) ? $ivrPoemData[0]->title : null,
            'link' => (count($ivrPoemData) != 0) ? \URL::to('/') . '/download-clip-file?p=' . $ivrPoemData[0]->key_press_1 . '&c=' . $ivrPoemData[0]->key_press_2 : null
        ];

        // Riddle
        $riddleIds = DB::table('ivr_steps as t1')->Join('ivr_steps as t2', 't1.id', 't2.parent_id')
            ->whereNull('t1.parent_id')
            ->where('t1.title', 'Dhadha List')
            ->pluck('t2.id');

        $ivrTotalRiddle = IvrClipPlayLog::whereIn('ivr_step_id', $riddleIds)
            ->where('play_date', '>=', $startDate)
            ->where('play_date', '<=', $endDate)
            ->sum('total_play_count');

        $ivrRiddleData = DB::table('ivr_clip_play_logs as t1')
            ->join('ivr_steps as t2', 't2.id', 't1.ivr_step_id')
            ->select(DB::raw('SUM(t1.total_play_count) AS total_log'), 't2.id', 't2.title', 't1.key_press_1', 't1.key_press_2')
            ->whereIn('t1.ivr_step_id', $riddleIds)
            ->where('t1.play_date', '>=', $startDate)
            ->where('t1.play_date', '<=', $endDate)
            ->groupBy('t1.ivr_step_id')
            ->orderBy('total_log', 'DESC')
            ->orderBy('t1.ivr_step_id', 'DESC')
            ->limit(1)
            ->get();

        $ivrRiddle = [
            'total' => $ivrTotalRiddle,
            'name' => (count($ivrRiddleData) != 0) ? $ivrRiddleData[0]->title : null,
            'link' => (count($ivrRiddleData) != 0) ? \URL::to('/') . '/download-clip-file?p=' . $ivrRiddleData[0]->key_press_1 . '&c=' . $ivrRiddleData[0]->key_press_2 : null
        ];

        // Story
        $storyIds = DB::table('ivr_steps as t1')->Join('ivr_steps as t2', 't1.id', 't2.parent_id')
            ->whereNull('t1.parent_id')
            ->where('t1.title', 'Golpo List')
            ->pluck('t2.id');

        $ivrTotalStory = IvrClipPlayLog::whereIn('ivr_step_id', $storyIds)
            ->where('play_date', '>=', $startDate)
            ->where('play_date', '<=', $endDate)
            ->sum('total_play_count');

        $ivrStoryData = DB::table('ivr_clip_play_logs as t1')
            ->join('ivr_steps as t2', 't2.id', 't1.ivr_step_id')
            ->select(DB::raw('SUM(t1.total_play_count) AS total_log'), 't2.id', 't2.title', 't1.key_press_1', 't1.key_press_2')
            ->whereIn('t1.ivr_step_id', $storyIds)
            ->where('t1.play_date', '>=', $startDate)
            ->where('t1.play_date', '<=', $endDate)
            ->groupBy('t1.ivr_step_id')
            ->orderBy('total_log', 'DESC')
            ->orderBy('t1.ivr_step_id', 'DESC')
            ->limit(1)
            ->get();

        $ivrStory = [
            'total' => $ivrTotalStory,
            'name' => (count($ivrStoryData) != 0) ? $ivrStoryData[0]->title : null,
            'link' => (count($ivrStoryData) != 0) ? \URL::to('/') . '/download-clip-file?p=' . $ivrStoryData[0]->key_press_1 . '&c=' . $ivrStoryData[0]->key_press_2 : null
        ];

        // Song Records
        $songIds = DB::table('ivr_steps as t1')->Join('ivr_steps as t2', 't1.id', 't2.parent_id')
            ->whereNull('t1.parent_id')
            ->where('t1.title', 'Gaan List')
            ->pluck('t2.id');

        $ivrTotalSong = IvrClipPlayLog::whereIn('ivr_step_id', $songIds)
            ->where('play_date', '>=', $startDate)
            ->where('play_date', '<=', $endDate)
            ->sum('total_play_count');

        $ivrSongData = DB::table('ivr_clip_play_logs as t1')
            ->join('ivr_steps as t2', 't2.id', 't1.ivr_step_id')
            ->select(DB::raw('SUM(t1.total_play_count) AS total_log'), 't2.id', 't2.title', 't1.key_press_1', 't1.key_press_2')
            ->whereIn('t1.ivr_step_id', $songIds)
            ->where('t1.play_date', '>=', $startDate)
            ->where('t1.play_date', '<=', $endDate)
            ->groupBy('t1.ivr_step_id')
            ->orderBy('total_log', 'DESC')
            ->orderBy('t1.ivr_step_id', 'DESC')
            ->limit(1)
            ->get();

        $ivrSong = [
            'total' => $ivrTotalSong,
            'name' => (count($ivrSongData) != 0) ? $ivrSongData[0]->title : null,
            'link' => (count($ivrSongData) != 0) ? \URL::to('/') . '/download-clip-file?p=' . $ivrSongData[0]->key_press_1 . '&c=' . $ivrSongData[0]->key_press_2 : null
        ];

        $dateFrom = date('d M Y', strtotime($request->fromDate));
        $dateTo = date('d M Y', strtotime($request->toDate));

        $data = [

            'ivrSong' => $ivrSong,
            'ivrStory' => $ivrStory,
            'ivrPoem' => $ivrPoem,
            'ivrRiddle' => $ivrRiddle,

            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo
        ];

        return Redirect::back()->with(['data' => $data]);
    }

    public function mostFavouriteContentPlayReportGeneratePDF(Request $request)
    {
        $data = [

            'title' => 'Ivr Most Favourite Content Play Report',

            'ivrStoryTotal' => $request->ivrStoryTotal,
            'ivrStoryName' => $request->ivrStoryName,
            'ivrStoryLink' => $request->ivrStoryLink,

            'ivrRiddleTotal' => $request->ivrRiddleTotal,
            'ivrRiddleName' => $request->ivrRiddleName,
            'ivrRiddleLink' => $request->ivrRiddleLink,

            'ivrPoemTotal' => $request->ivrPoemTotal,
            'ivrPoemName' => $request->ivrPoemName,
            'ivrPoemLink' => $request->ivrPoemLink,

            'ivrSongTotal' => $request->ivrSongTotal,
            'ivrSongName' => $request->ivrSongName,
            'ivrSongLink' => $request->ivrSongLink,

            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo
        ];

        $pdf = PDF::loadView('backend.reports.ivr.most_fav_content_play_report.fav_content_play_report_pdf', $data);
        return $pdf->download('Ivr Most Favourite Content Play Report.pdf');

    }

    public function callAnalysisReportAreaWise()
    {
        $area = Contact::groupBy('area')
            ->select('area')->orderBy('area', 'DESC')->get();

        $district = Contact::groupBy('district')
            ->select('district')->orderBy('district', 'DESC')->get();

        $division = Contact::groupBy('division')
            ->select('division')->orderBy('division', 'DESC')->get();

        $data = [
            'title' => 'IVR Call Analysis Area Wise Report',
            'area' => $area,
            'district' => $district,
            'division' => $division
        ];

        return view('backend.reports.ivr.call_analysis_report_area_wise.call_analysis_report_area_wise', $data);
    }

    public function requestCallAnalysisReportAreaWise(Request $request)
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
        $ivrCampaignHelper = new IvrCampaignHelper;
        $ivrTargetAudience = $ivrCampaignHelper->targetAudienceAreaWise($filterList);
        $callDetailsAudience = $ivrCampaignHelper->callDetailsAreaWise($filterList);

        ($request->gender) ? $gender = $request->gender : $gender = 'All';
        $dateFrom = date('d M Y', strtotime($request->fromDate));
        $dateTo = date('d M Y', strtotime($request->toDate));

        if ($request->district) $location = $request->district;
        else if ($request->area) $location = $request->area;
        else if ($request->division) $location = $request->division;
        else $location = 'All';

        $data = [
            'area' => $callDetailsAudience['area'],
            'areaTargetAudience' => $ivrTargetAudience,
            'areaTotalCount' => $callDetailsAudience['areaTotalCount'],
            'totalCallReceived' => $callDetailsAudience['totalCallReceived'],
            'totalCallCompleted' => $callDetailsAudience['totalCallCompleted'],
            'totalCallFailed' => $callDetailsAudience['totalCallFailed'],
            'totalInboundCall' => $callDetailsAudience['totalInboundCall'],
            'sumOfInboundCallByCount' => 0,
            'gender' => $gender,
            'location' => $location,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo

        ];

        return Redirect::back()->with(['data' => $data]);
    }

    public function callAnalysisReportAreaWiseGeneratePDF(Request $request)
    {
        $data = [
            'title' => 'IVR Call Analysis Area Wise Report',
            'area' => $request->area,
            'areaTargetAudience' => $request->areaTargetAudience,
            'areaTotalCount' => $request->areaTotalCount,
            'totalCallReceived' => $request->totalCallReceived,
            'totalCallCompleted' => $request->totalCallCompleted,
            'totalCallFailed' => $request->totalCallFailed,
            'totalInboundCall' => $request->totalInboundCall,
            'sumOfInboundCallByCount' => $request->sumOfInboundCallByCount,
            'gender' => $request->gender,
            'location' => $request->location,
            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo
        ];

        $pdf = PDF::loadView('backend.reports.ivr.call_analysis_report_area_wise.call_analysis_report_area_wise_pdf', $data);
        return $pdf->download('IVR Call Analysis Area Wise Report.pdf');
    }

    public function receiveReport()
    {
        $area = Contact::where('area', '<>', null)
            ->groupBy('area')
            ->pluck('area');

        $district = Contact::where('district', '<>', null)
            ->groupBy('district')
            ->pluck('district');

        $division = Contact::where('division', '<>', null)
            ->groupBy('division')
            ->pluck('division');

        $data = [
            'title' => 'IVR Call Receive Report',
            'area' => $area,
            'district' => $district,
            'division' => $division
        ];

        return view('backend.reports.ivr.call_receive_report.call_receive_report', $data);
    }

    public function requestReceiveReport(Request $request)
    {
        // Total Calls
        $fromDate = $request->fromDate . ' 09:00:00';
        $toDate = $request->toDate . ' 19:00:00';

        $now = Carbon::now();
        $weekStartDate = $now->startOfMonth()->format('Y-m-d');
        $weekEndDate = $now->endOfMonth()->format('Y-m-d');


        $request->fromDate = isset($request->fromDate) ? $request->fromDate : $weekStartDate;
        $request->toDate = isset($request->toDate) ? $request->toDate : $weekEndDate;

        $filterList =
            [
                'dateFrom' => $request->fromDate,
                'dateTo' => $request->toDate,
                'gender' => $request->gender,
                'area' => $request->area,
                'district' => $request->district,
                'division' => $request->division
            ];


        $ivrCampaignHelper = new IvrCampaignHelper();

        $targetAudienceOutbound = $ivrCampaignHelper->targetAudienceStakeholderWise($filterList);

        //$targetAudienceOutbound = $ivrCampaignHelper->targetAudienceStakeholderWise(['dateFrom' => $request->fromDate ?? $weekStartDate, 'dateTo' => $request->toDate ?? $weekEndDate]);


//        $data['outboundTargetAudience'] = [
//            'outboundTargetAudience' => $targetAudienceOutbound['total'],
//
//        ];

        $ivrCallOutbound = $ivrCampaignHelper->ivrOutBoundsCallDetails($filterList);

        //recieve
//        $outbound_call_hourly = $ivrCallOutbound
//            ->where('called', 'Yes')->where('uniqueid', '!=', NULL)
//            ->groupBy("fromHour")->toArray();
//
//
//        $hours = array_keys($outbound_call_hourly);
////
////
//        $hourly_call_count = [];
//        $hourly_call_duration_count = [];
//
//        foreach ($hours as $hour) {
//            $count = $ivrCallOutbound
//                ->where('called', 'Yes')
//                ->whereNotNull('uniqueid')
//                ->where('fromHour', $hour)
//                ->count();
//            $avgHour = $ivrCallOutbound
//                ->where('called', 'Yes')
//                ->whereNotNull('uniqueid')
//                ->where('fromHour', $hour)
//                ->avg('duration');
//
//
//            array_push($hourly_call_count, $count);
//            array_push($hourly_call_duration_count, $avgHour);
//        }



        $receiveRangeOneCount = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 9)
            ->where('fromHour', '<', 11)
            ->count();

        $receiveRangeTwoCount = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 11)
            ->where('fromHour', '<', 13)
            ->count();

        $receiveRangeThreeCount = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 13)
            ->where('fromHour', '<', 15)
            ->count();

        $receiveRangeFourCount = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 15)
            ->where('fromHour', '<', 17)
            ->count();


        $receiveRangeFiveCount = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 17)
            ->where('fromHour', '<=', 19)
            ->count();

        $averageRangeOne = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 9)
            ->where('fromHour', '<', 11)
            ->where('duration', '!=', '')
            ->avg('duration');

        $averageRangeTwo = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 11)
            ->where('fromHour', '<', 13)
            ->where('duration', '!=', '')
            ->avg('duration');

        $averageRangeThree = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 13)
            ->where('fromHour', '<', 15)
            ->where('duration', '!=', '')
            ->avg('duration');

        $averageRangeFour = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 15)
            ->where('fromHour', '<', 17)
            ->where('duration', '!=', '')
            ->avg('duration');
    // Average Range Five
        $averageRangeFive = $ivrCallOutbound
            ->where('called', 'Yes')
            ->whereNotNull('uniqueid')
            ->where('fromHour', '>=', 17)
            ->where('fromHour', '<=', 19)
            ->where('duration', '!=', '')
            ->avg('duration');


        ($request->gender) ? $gender = $request->gender : $gender = 'All';
        $dateFrom = date('d M Y', strtotime($request->fromDate));
        $dateTo = date('d M Y', strtotime($request->toDate));

        if ($request->district) $location = $request->district;
        else if ($request->area) $location = $request->area;
        else if ($request->division) $location = $request->division;
        else $location = 'All';

        $data = [

            'receiveRangeOne' => ($receiveRangeOneCount != 0 && $targetAudienceOutbound['total'] != 0) ? ($receiveRangeOneCount / $targetAudienceOutbound['total']) * 100 : 0,
            'receiveRangeTwo' => ($receiveRangeTwoCount != 0 && $targetAudienceOutbound['total'] != 0) ? ($receiveRangeTwoCount / $targetAudienceOutbound['total']) * 100 : 0,
            'receiveRangeThree' => ($receiveRangeThreeCount != 0 && $targetAudienceOutbound['total'] != 0) ? ($receiveRangeThreeCount / $targetAudienceOutbound['total']) * 100 : 0,
            'receiveRangeFour' => ($receiveRangeFourCount != 0 && $targetAudienceOutbound['total'] != 0) ? ($receiveRangeFourCount / $targetAudienceOutbound['total']) * 100 : 0,
            'receiveRangeFive' => ($receiveRangeFiveCount != 0 && $targetAudienceOutbound['total'] != 0) ? ($receiveRangeFiveCount / $targetAudienceOutbound['total']) * 100 : 0,

            'averageRangeOne' => ($averageRangeOne) ? $averageRangeOne : 0,
            'averageRangeTwo' => ($averageRangeTwo) ? $averageRangeTwo : 0,
            'averageRangeThree' => ($averageRangeThree) ? $averageRangeThree : 0,
            'averageRangeFour' => ($averageRangeFour) ? $averageRangeFour : 0,
            'averageRangeFive' => ($averageRangeFive) ? $averageRangeFive : 0,

            'gender' => $gender,
            'location' => $location,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo
        ];

        return Redirect::back()->with(['data' => $data]);
    }

    public function receiveReportGeneratePDF(Request $request)
    {
        $data = [

            'title' => 'IVR Call Receive Report',

            'receiveRangeOne' => $request->receiveRangeOne,
            'receiveRangeTwo' => $request->receiveRangeTwo,
            'receiveRangeThree' => $request->receiveRangeThree,
            'receiveRangeFour' => $request->receiveRangeFour,
            'receiveRangeFive' => $request->receiveRangeFive,

            'averageRangeOne' => $request->averageRangeOne,
            'averageRangeTwo' => $request->averageRangeTwo,
            'averageRangeThree' => $request->averageRangeThree,
            'averageRangeFour' => $request->averageRangeFour,
            'averageRangeFive' => $request->averageRangeFive,

            'gender' => $request->gender,
            'location' => $request->location,
            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo
        ];

        $pdf = PDF::loadView('backend.reports.ivr.call_receive_report.call_receive_report_pdf', $data);
        return $pdf->download('IVR Call Receive Report.pdf');

    }

}
