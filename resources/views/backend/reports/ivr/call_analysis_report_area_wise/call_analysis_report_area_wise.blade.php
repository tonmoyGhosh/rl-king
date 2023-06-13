@extends('layouts.backend_app')

@section('title', 'IVR Call Analysis Area Wise Report')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title">{{ $title }}</h2>
                </div>

                @include('backend.reports.ivr.call_analysis_report_area_wise.filterSection')

                @if(session()->get('data'))
                    @php $data = session()->get('data'); @endphp
                    <div class="card-body">

                        <form action="{{ route('ivr-call-analysis-area-wise-generate-pdf') }}" method="POST">
                            @csrf

                            @foreach($data['area'] as $area)
                                <input type="hidden" name="area[]" value="{{$area}}">
                            @endforeach

                            @foreach($data['area'] as $area)
                                @if(isset($data['areaTargetAudience'][$area]))
                                    <input type="hidden" name="areaTargetAudience[{{$area}}]" value="{{$data['areaTargetAudience'][$area]}}">
                                @endif
                            @endforeach

                            @foreach($data['area'] as $area)
                                @if(isset($data['areaTotalCount'][$area]))
                                    <input type="hidden" name="areaTotalCount[{{$area}}]" value="{{$data['areaTotalCount'][$area]}}">
                                @endif
                            @endforeach

                            @foreach($data['area'] as $area)
                                @if(isset($data['totalCallReceived'][$area]))
                                    <input type="hidden" name="totalCallReceived[{{$area}}]" value="{{$data['totalCallReceived'][$area]}}">
                                @endif
                            @endforeach

                            @foreach($data['area'] as $area)
                                @if(isset($data['totalCallCompleted'][$area]))
                                    <input type="hidden" name="totalCallCompleted[{{$area}}]" value="{{$data['totalCallCompleted'][$area]}}">
                                @endif
                            @endforeach

                            @foreach($data['area'] as $area)
                                @if(isset($data['totalCallFailed'][$area]))
                                    <input type="hidden" name="totalCallFailed[{{$area}}]" value="{{$data['totalCallFailed'][$area]}}">
                                @endif
                            @endforeach

                            @foreach($data['area'] as $area)
                                @if(isset($data['totalInboundCall'][$area]))
                                    <input type="hidden" name="totalInboundCall[{{$area}}]" value="{{$data['totalInboundCall'][$area]}}">
                                @endif
                            @endforeach

                            <input type="hidden" name="sumOfInboundCallByCount" value="{{$data['sumOfInboundCallByCount']}}">
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
{{--                                        <th>Total Number of Stakeholder</th>--}}
                                        <th>Number of Calls Sent</th>
                                        <th>%</th>
                                        <th>Number of Calls Received</th>
                                        <th>%</th>
                                        <th>Number of Completed Calls</th>
                                        <th>%</th>
                                        <th>Number of withdrawn before completing a call</th>
                                        <th>%</th>
                                        <th>Number of inbound calls </th>
                                        <th>%</th>
                                    </tr>
                                    @php
                                            $areaTargetAudience =0;
                                            $total_number_of_stakeholder = 0;
                                            $number_of_calls_sent =0;
                                            $number_of_calls_received =0;
                                            $number_of_completed_calls=0;
                                            $number_of_withdrawn_before_completing_a_call=0;
                                            $number_of_inbound_calls=0;
                                    @endphp
                                    @foreach ($data['area'] as $item)

                                        @if($item)
                                            @php
                                                $areaTargetAudience = $areaTargetAudience + ($data['areaTargetAudience'][$item] ?? (int) "0");
                                                $total_number_of_stakeholder = $total_number_of_stakeholder + ($data['areaTotalCount'][$item] ?? (int) "0");
                                                $number_of_calls_sent = $number_of_calls_sent + ($data['areaTotalCount'][$item] ?? (int) "0");
                                                $number_of_calls_received = $number_of_calls_received + ($data['totalCallReceived'][$item] ?? (int) "0");
                                                $number_of_completed_calls = $number_of_completed_calls + ($data['totalCallCompleted'][$item] ?? (int) "0");
                                                $number_of_withdrawn_before_completing_a_call =$number_of_withdrawn_before_completing_a_call + ($data['totalCallFailed'][$item] ?? (int) "0");
                                                $number_of_inbound_calls = $number_of_inbound_calls + ($data['totalInboundCall'][$item] ?? (int) "0");
                                            @endphp
                                            <tr>

                                                <td>{{$item}}</td>
                                                <td>{{($data['areaTargetAudience'][$item] ?? (int) "0")}}</td>
{{--                                                <td>{{($data['areaTotalCount'][$item] ?? (int) "0")}}</td>--}}
                                                <td>{{($data['areaTotalCount'][$item] ?? (int) "0")}}</td>
                                                <td>{{($data['areaTargetAudience'][$item] != 0 ) ? round( (($data['areaTotalCount'][$item] ?? (int) "0") / ($data['areaTargetAudience'][$item]) ) * 100) : 0}}</td>
                                                <td>{{($data['totalCallReceived'][$item] ?? (int) "0")}}</td>
                                                <td>{{($data['areaTotalCount'][$item] != 0 ) ? round( (($data['totalCallReceived'][$item] ?? (int) "0")/ ($data['areaTotalCount'][$item]) ) * 100) : 0}}</td>
                                                <td>{{$data['totalCallCompleted'][$item] ?? (int) "0"}}</td>
                                                <td>{{($data['areaTotalCount'][$item] != 0 ) ? round( (($data['totalCallCompleted'][$item] ?? (int) "0") / ($data['areaTotalCount'][$item]) ) * 100) : 0}}</td>
                                                <td>{{($data['totalCallFailed'][$item] ?? (int) "0") }}</td>
                                                <td>{{($data['areaTotalCount'][$item] != 0 ) ? round( (($data['totalCallFailed'][$item] ?? (int) "0") / ($data['areaTotalCount'][$item]) ) * 100) : 0}}</td>
                                                <td>{{$data['totalInboundCall'][$item] ?? (int) "0"}}</td>
                                                <td>{{($data['areaTargetAudience'][$item] != 0 ) ? round( (($data['totalInboundCall'][$item] ?? (int) "0") / ($data['areaTargetAudience'][$item]) ) * 100) : 0}}</td>

                                            </tr>
                                        @endif
                                    @endforeach
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td>{{$areaTargetAudience}}</td>
{{--                                                <td>{{$total_number_of_stakeholder}}</td>--}}
                                                <td>{{$number_of_calls_sent}}</td>
                                                <td>{{($areaTargetAudience != 0) ? round(($total_number_of_stakeholder / $areaTargetAudience) * 100) : 0}}</td>
                                                <td>{{$number_of_calls_received}}</td>
                                                <td>{{($number_of_calls_sent != 0) ? round(($number_of_calls_received / $number_of_calls_sent) * 100) : 0}}</td>
                                                <td>{{$number_of_completed_calls}}</td>
                                                <td>{{($number_of_calls_sent != 0) ? round(($number_of_completed_calls / $number_of_calls_sent) * 100) : 0}}</td>
                                                <td>{{$number_of_withdrawn_before_completing_a_call}}</td>
                                                <td>{{($number_of_calls_sent != 0) ? round(($number_of_withdrawn_before_completing_a_call / $number_of_calls_sent) * 100) : 0}}</td>
                                                <td>{{$number_of_inbound_calls}}</td>
                                                <td>{{($areaTargetAudience != 0) ? round(($number_of_inbound_calls / $areaTargetAudience) * 100) : 0}}</td>

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
