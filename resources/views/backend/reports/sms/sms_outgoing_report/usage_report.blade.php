@extends('layouts.backend_app')

@section('title', 'SMS Outgoing Report')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2 class="card-title">{{ $title }}</h2>
            </div>


            @include('backend.reports.sms.sms_outgoing_report.filterSection')

            @if(session()->get('data'))
            @php $data = session()->get('data');

            @endphp

            <div class="card-body">
                <form action="{{ route('sms-usages-report-pdf') }}" method="POST">
                    @csrf
                    
                    @foreach($data['area'] as $area)
                        <input type="hidden" name="area[]" value="{{$area}}">
                    @endforeach

                    @foreach($data['area'] as $area)
                        @if(isset($data['smsTargetAudiencesAreaWise'][$area]))
                            <input type="hidden" name="smsTargetAudiencesAreaWise[{{$area}}]" value="{{$data['smsTargetAudiencesAreaWise'][$area]}}">
                        @endif
                    @endforeach

                    @foreach($data['area'] as $area)
                        @if(isset($data['smsCampaignRecords'][$area]))
                            <input type="hidden" name="smsSent[{{$area}}]" value="{{$data['smsCampaignRecords'][$area]['total_sent']}}">
                        @endif
                    @endforeach

                    @foreach($data['area'] as $area)
                        @if(isset($data['smsCampaignRecords'][$area]))
                            <input type="hidden" name="smsDelivered[{{$area}}]" value="{{$data['smsCampaignRecords'][$area]['total_success']}}">
                        @endif
                    @endforeach

                    @foreach($data['area'] as $area)
                        @if(isset($data['smsCampaignRecords'][$area]))
                            <input type="hidden" name="smsFailed[{{$area}}]" value="{{$data['smsCampaignRecords'][$area]['total_failed']}}">
                        @endif
                    @endforeach

                    <input type="hidden" name="gender" value="{{ $data['gender'] }}">
                    <input type="hidden" name="location" value="{{ $data['location'] }}">
                    <input type="hidden" name="dateFrom" value="{{ $data['dateFrom'] }}">
                    <input type="hidden" name="dateTo" value="{{ $data['dateTo'] }}">

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Download PDF</button>
                    </div>

                </form>
                <hr>
                <div class="col-md-12">
                    <div class="table-responsive">

                        @php $setting = \App\Models\Setting::select('logo')->first(); @endphp

                        @if(!$setting)
                        <a href="#" class="logo">
                            <img alt="Logo" src="{{asset('metch')}}/media/logos/app_logo.png" class="page_speed_8658815 logo-img">
                        </a>
                        @else
                        <a href="#" class="logo">
                            <img alt="Logo" src="{{$setting->logo}}" class="page_speed_8658815 logo-img">
                        </a>
                        @endif

                        @php $setting = \App\Models\Setting::select('company_name')->first(); @endphp

                        <!-- <h2 class="company_name">{{$setting->company_name}}</h2> -->

                        @php $setting = \App\Models\Setting::select('company_address')->first(); @endphp

                        <!-- <h5 class="company_address">{{$setting->company_address}}</h5> -->

                        @php $mydate = getdate(date("U"));@endphp

                        <h6 class="date"><b>Report Generated At: </b>{{"$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"}}</h6>

                        <h3 class="report_title"><u>{{ $title }}</u></h3>

                        {{-- <p style="margin-top: 3%; font-size: 15px;">This report is generated based on these parameters: </p>--}}
                        <br>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Gender: </b></p>
                                        <p><b>Location: </b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $data['gender'] }}</p>
                                        <p>{{ $data['location'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 offset-md-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Date From:</b></p>
                                        <p><b>Date To:</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $data['dateFrom'] }}</p>
                                        <p>{{ $data['dateTo'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <table style="width: 100%">


                            <tr>
                                <th>Area</th>
                                <th>Target Audience</th>
                                <th>No of SMS Sent (Recipient)</th>
                                <th>%</th>
                                <th>Deliverd</th>
                                <th>%</th>
                                <th>Failed</th>
                                <th>%</th>
                            </tr>

                            @php 
                                $totalTargetAudience = $totalSent = $totalDeliver = $totalFail = 0;
                            @endphp

                            @foreach ($data['area'] as $item)
                                
                                @if($item)

                                    @php
                                        $totalTargetAudience = $totalTargetAudience + $data['smsTargetAudiencesAreaWise'][$item];
                                        $totalSent = $totalSent + $data['smsCampaignRecords'][$item]['total_sent'];
                                        $totalDeliver = $totalDeliver + $data['smsCampaignRecords'][$item]['total_success'];
                                        $totalFail = $totalFail + $data['smsCampaignRecords'][$item]['total_failed'];
                                    @endphp

                                    <tr>

                                        <td>{{ $item }}</td>
                                        <td>{{ $data['smsTargetAudiencesAreaWise'][$item] }}</td>
                                        <td>{{ $data['smsCampaignRecords'][$item]['total_sent'] }}</td>
                                        <td>{{ ($data['smsTargetAudiencesAreaWise'][$item] != 0) ? round(($data['smsCampaignRecords'][$item]['total_sent'] / $data['smsTargetAudiencesAreaWise'][$item]) * 100) : 0 }}</td>
                                        <td>{{ $data['smsCampaignRecords'][$item]['total_success'] }}</td>
                                        <td>{{ ($data['smsTargetAudiencesAreaWise'][$item] != 0) ? round(($data['smsCampaignRecords'][$item]['total_success'] / $data['smsTargetAudiencesAreaWise'][$item]) * 100) : 0 }}</td>
                                        <td>{{ $data['smsCampaignRecords'][$item]['total_failed'] }}</td>
                                        <td>{{ ($data['smsTargetAudiencesAreaWise'][$item] != 0) ? round(($data['smsCampaignRecords'][$item]['total_failed'] / $data['smsTargetAudiencesAreaWise'][$item]) * 100) : 0 }}</td>

                                    </tr>

                                @endif

                            @endforeach

                            <tr>
                                <td><b>Total</b></td>
                                <td>{{ $totalTargetAudience }}</td>
                                <td>{{ $totalSent }}</td>
                                <td>{{ ($totalTargetAudience != 0) ? round(($totalSent / $totalTargetAudience) * 100) : 0 }}</td>
                                <td>{{ $totalDeliver }}</td>
                                <td>{{ ($totalTargetAudience != 0) ? round(($totalDeliver / $totalTargetAudience) * 100) : 0 }}</td>
                                <td>{{ $totalFail }}</td>
                                <td>{{ ($totalTargetAudience != 0) ? round(($totalFail / $totalTargetAudience) * 100) : 0 }}</td>
                            </tr>
                        
                        </table>

                        <br>
                        <br>
                        @php $setting = \App\Models\Setting::select('company_name')->first(); @endphp
                        <footer>This report is generated from <a href="{{\URL::to('/')}}">{{ URL::to('/') }}</a></footer>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>



@endsection
