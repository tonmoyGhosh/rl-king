<?php

namespace App\Http\Controllers\Backend\ListReports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\IvrCampaignHelper;
use DataTables;
use App\Models\Contact;
use Yajra\DataTables\Html\Button;


class InboundVoiceCallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inboundVoiceCallReport(Request $request)
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
            'title' => 'Inbound IVR Voice Call Registered Report',
            'area' => $area,
            'district' => $district,
            'division' => $division,
            'stakeholder' => $stakeholder,
        ];

        if($request->ajax())
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

                $ivrTargetAudiences = $ivrCampaignObject->ivrInBoundsCallDetails($filterList);
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
                ->addColumn('duration', function($row){
                    return ($row->duration) ? $row->duration : 0;
                })
                ->addColumn('status', function($row){
                    return ($row->uniqueid) ? 'Recived' : 'Not Recived';
                })
                ->rawColumns(['name', 'gender', 'grade', 'stakeholder', 'occupation', 'division', 'district', 'area', 'duration', 'status'])
                ->make(true);
        }

        return view('backend.list_reports.ivr.inbound.inboud_call_report', $data);
    }

    public function inboundVoiceCallUnregisteredReport(Request $request)
    {       
        $data = [
            'title' => 'Inbound IVR Voice Call Unregistered Report'
        ];

        if($request->ajax())
        {
            $unregisteredCalledDetails = [];
            $unregisteredRecivedCalledDetails = [];

            if(($request->get('fromDate')) && ($request->get('toDate')))
            {
                $filterList =
                    [
                        'dateFrom' => ($request->get('fromDate')) ? $request->get('fromDate') : null,
                        'dateTo'   => ($request->get('toDate')) ? $request->get('toDate') : null,
                    ];

                $ivrCampaignObject = new IvrCampaignHelper;

                $unregisteredCalledDetails = $ivrCampaignObject->ivrInBoundsCallDetailsUnregisterd($filterList);
                // $unregisteredRecivedCalledDetails = $unregisteredCalledDetails->where('uniqueid', '!=', '');

            }

            return Datatables::of($unregisteredCalledDetails)
                ->addIndexColumn()
                ->addColumn('phone_number', function($row){
                    return ($row->phone_number) ? strtolower($row->phone_number) : 'N/A';
                })
                ->addColumn('status', function($row){
                    return ($row->uniqueid) ? 'Recived' : 'Not Recived';
                })
                ->addColumn('duration', function($row){
                    return ($row->duration) ? $row->duration : 0;
                })
                ->rawColumns(['phone_number', 'status', 'duration'])
                ->make(true);
        }

        return view('backend.list_reports.ivr.inbound.inboud_call_unregister_report', $data);
    }

}
