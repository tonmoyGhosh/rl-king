@extends('layouts.backend_app')

@section('title', 'IVR Call Analysis Report')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2 class="card-title">{{ $title }}</h2>
            </div>

            @include('backend.reports.ivr.call_analysis_report.filterSection')

            @if(session()->get('data'))
            @php $data = session()->get('data'); @endphp
            <div class="card-body">

                <form action="{{ route('ivr-call-analysis-generate-pdf') }}" method="POST">
                    @csrf

                    <input type="hidden" name="staffTargetAudiences" value="{{ $data['staffTargetAudiences'] }}">
                    <input type="hidden" name="staffTotalCalled" value="{{ $data['staffTotalCalled'] }}">
                    <input type="hidden" name="staffTotalCallRecived" value="{{ $data['staffTotalCallRecived'] }}">
                    <input type="hidden" name="staffTotalCallCompleted" value="{{ $data['staffTotalCallCompleted'] }}">
                    <input type="hidden" name="staffTotalCallFailed" value="{{ $data['staffTotalCallFailed'] }}">
                    <input type="hidden" name="staffTotalInboundCalled" value="{{ $data['staffTotalInboundCalled'] }}">

                    <input type="hidden" name="teacherTargetAudiences" value="{{ $data['teacherTargetAudiences'] }}">
                    <input type="hidden" name="teacherTotalCalled" value="{{ $data['teacherTotalCalled'] }}">
                    <input type="hidden" name="teacherTotalCallRecived" value="{{ $data['teacherTotalCallRecived'] }}">
                    <input type="hidden" name="teacherTotalCallCompleted" value="{{ $data['teacherTotalCallCompleted'] }}">
                    <input type="hidden" name="teacherTotalCallFailed" value="{{ $data['teacherTotalCallFailed'] }}">
                    <input type="hidden" name="teacherTotalInboundCalled" value="{{ $data['teacherTotalInboundCalled'] }}">

                    <input type="hidden" name="govtTargetAudiences" value="{{ $data['govtTargetAudiences'] }}">
                    <input type="hidden" name="govtTotalCalled" value="{{ $data['govtTotalCalled'] }}">
                    <input type="hidden" name="govtTotalCallRecived" value="{{ $data['govtTotalCallRecived'] }}">
                    <input type="hidden" name="govtTotalCallCompleted" value="{{ $data['govtTotalCallCompleted'] }}">
                    <input type="hidden" name="govtTotalCallFailed" value="{{ $data['govtTotalCallFailed'] }}">
                    <input type="hidden" name="govtTotalInboundCalled" value="{{ $data['govtTotalInboundCalled'] }}">

                    <input type="hidden" name="studentTargetAudiences" value="{{ $data['studentTargetAudiences'] }}">
                    <input type="hidden" name="studentTotalCalled" value="{{ $data['studentTotalCalled'] }}">
                    <input type="hidden" name="studentTotalCallRecived" value="{{ $data['studentTotalCallRecived'] }}">
                    <input type="hidden" name="studentTotalCallCompleted" value="{{ $data['studentTotalCallCompleted'] }}">
                    <input type="hidden" name="studentTotalCallFailed" value="{{ $data['studentTotalCallFailed'] }}">
                    <input type="hidden" name="studentTotalInboundCall" value="{{ $data['studentTotalInboundCall'] }}">

                    <input type="hidden" name="upspecifiedTargetAudiences" value="{{ $data['upspecifiedTargetAudiences'] }}">
                    <input type="hidden" name="upspecifiedTotalCalled" value="{{ $data['upspecifiedTotalCalled'] }}">
                    <input type="hidden" name="upspecifiedTotalCallRecived" value="{{ $data['upspecifiedTotalCallRecived'] }}">
                    <input type="hidden" name="upspecifiedTotalCallCompleted" value="{{ $data['upspecifiedTotalCallCompleted'] }}">
                    <input type="hidden" name="upspecifiedTotalCallFailed" value="{{ $data['upspecifiedTotalCallFailed'] }}">
                    <input type="hidden" name="upspecifiedTotalInboundCall" value="{{ $data['upspecifiedTotalInboundCall'] }}">

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
                                <th>Profession</th>
                                <th>Target Audience</th>
{{--                                <th>Total Number of Stakeholder</th>--}}
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

                            $staffTotal1 = $staffTotal2 = $staffTotal3 = $staffTotal4 = $staffTotal5 = 0;

                            $staffTotal1 = ($data['staffTargetAudiences'] != 0) ? round(( $data['staffTotalCalled'] / $data['staffTargetAudiences'] ) * 100) : 0;

                            $staffTotal2 = ($data['staffTotalCalled'] != 0) ? round(( $data['staffTotalCallRecived'] / $data['staffTotalCalled'] ) * 100) : 0;

                            $staffTotal3 = ($data['staffTotalCalled'] != 0) ? round(( $data['staffTotalCallCompleted'] / $data['staffTotalCalled'] ) * 100) : 0;

                            $staffTotal4 = ($data['staffTotalCalled'] != 0) ? round(( $data['staffTotalCallFailed'] / $data['staffTotalCalled'] ) * 100) : 0;

                            $staffTotal5 = ($data['staffTargetAudiences'] != 0) ? round(( $data['staffTotalInboundCalled'] / $data['staffTargetAudiences'] ) * 100) : 0;


                            @endphp

                            <tr>
                                <th>Staff</th>
                                <th>{{ $data['staffTargetAudiences'] }}</th>
{{--                                <td>{{ $data['staffTotalCalled'] }}</td>--}}
                                <td>{{ $data['staffTotalCalled'] }}</td>
                                <td>{{ $staffTotal1 }}</td>
                                <td>{{ $data['staffTotalCallRecived'] }}</td>
                                <td>{{ $staffTotal2 }}</td>
                                <td>{{ $data['staffTotalCallCompleted'] }}</td>
                                <td>{{ $staffTotal3 }}</td>
                                <td>{{ $data['staffTotalCallFailed'] }}</td>
                                <td>{{ $staffTotal4 }}</td>
                                <td>{{ $data['staffTotalInboundCalled'] }}</td>
                                <td>{{ $staffTotal5 }}</td>
                            </tr>

                            @php

                            $teahcerTotal1 = $teahcerTotal2 = $teahcerTotal3 = $teahcerTotal4 = $teahcerTotal5 = 0;

                            $teahcerTotal1 =($data['teacherTargetAudiences'] != 0)  ? round(( $data['teacherTotalCalled'] / $data['teacherTargetAudiences'] ) * 100) : 0;

                            $teahcerTotal2 =($data['teacherTotalCalled'] != 0) ? round(( $data['teacherTotalCallRecived'] / $data['teacherTotalCalled'] ) * 100) : 0;

                            $teahcerTotal3 =($data['teacherTotalCalled'] != 0) ? round(( $data['teacherTotalCallCompleted'] / $data['teacherTotalCalled'] ) * 100) : 0;

                            $teahcerTotal4 =($data['teacherTotalCalled'] != 0) ? round(( $data['teacherTotalCallFailed'] / $data['teacherTotalCalled'] ) * 100) : 0;

                            $teahcerTotal5 =($data['teacherTargetAudiences'] != 0) ? round(( $data['teacherTotalInboundCalled'] / $data['teacherTargetAudiences'] ) * 100) : 0;


                            @endphp

                            <tr>
                                <th>Teachers</th>
                                <th>{{ $data['teacherTargetAudiences'] }}</th>
{{--                                <td>{{ $data['teacherTotalCalled'] }}</td>--}}
                                <td>{{ $data['teacherTotalCalled'] }}</td>
                                <td>{{ $teahcerTotal1 }}</td>
                                <td>{{ $data['teacherTotalCallRecived'] }}</td>
                                <td>{{ $teahcerTotal2 }}</td>
                                <td>{{ $data['teacherTotalCallCompleted'] }}</td>
                                <td>{{ $teahcerTotal3 }}</td>
                                <td>{{ $data['teacherTotalCallFailed'] }}</td>
                                <td>{{ $teahcerTotal4 }}</td>
                                <td>{{ $data['teacherTotalInboundCalled'] }}</td>
                                <td>{{ $teahcerTotal5 }}</td>
                            </tr>

                            @php

                            $govtTotal1 = $govtTotal2 = $govtTotal3 = $govtTotal4 = $govtTotal5 = 0;

                            $govtTotal1 =($data['govtTargetAudiences'] != 0) ? round(( $data['govtTotalCalled'] / $data['govtTargetAudiences'] ) * 100) : 0;

                            $govtTotal2 =($data['govtTotalCalled'] != 0) ? round(( $data['govtTotalCallRecived'] / $data['govtTotalCalled'] ) * 100) : 0;

                            $govtTotal3 =($data['govtTotalCalled'] != 0) ? round(( $data['govtTotalCallCompleted'] / $data['govtTotalCalled'] ) * 100) : 0;

                            $govtTotal4 =($data['govtTotalCalled'] != 0) ? round(( $data['govtTotalCallFailed'] / $data['govtTotalCalled'] ) * 100) : 0;

                            $govtTotal5 =($data['govtTargetAudiences'] != 0) ? round(( $data['govtTotalInboundCalled'] / $data['govtTargetAudiences'] ) * 100) : 0;



                            @endphp

                            <tr>
                                <th>Govt Officials</th>
                                <th>{{ $data['govtTargetAudiences'] }}</th>
{{--                                <td>{{ $data['govtTotalCalled'] }}</td>--}}
                                <td>{{ $data['govtTotalCalled'] }}</td>
                                <td>{{ $govtTotal1 }}</td>
                                <td>{{ $data['govtTotalCallRecived'] }}</td>
                                <td>{{ $govtTotal2 }}</td>
                                <td>{{ $data['govtTotalCallCompleted'] }}</td>
                                <td>{{ $govtTotal3 }}</td>
                                <td>{{ $data['govtTotalCallFailed'] }}</td>
                                <td>{{ $govtTotal4 }}</td>
                                <td>{{ $data['govtTotalInboundCalled'] }}</td>
                                <td>{{ $govtTotal5 }}</td>
                            </tr>

                            @php

                            $studentTotal1 = $studentTotal2 = $studentTotal3 = $studentTotal4 = $studentTotal5 = 0;

                            $studentTotal1 =($data['studentTargetAudiences'] != 0) ? round( ( $data['studentTotalCalled'] / $data['studentTargetAudiences'] ) * 100) : 0;

                            $studentTotal2 =($data['studentTotalCalled'] != 0) ? round( ( $data['studentTotalCallRecived'] / $data['studentTotalCalled'] ) * 100) : 0;

                            $studentTotal3 =($data['studentTotalCalled'] != 0) ? round(( $data['studentTotalCallCompleted'] / $data['studentTotalCalled'] ) * 100) : 0;

                            $studentTotal4 =($data['studentTotalCalled'] != 0) ? round(( $data['studentTotalCallFailed'] / $data['studentTotalCalled'] ) * 100) : 0;

                            $studentTotal5 =($data['studentTargetAudiences'] != 0) ? round(( $data['studentTotalInboundCall'] / $data['studentTargetAudiences'] ) * 100) : 0;


                            @endphp

                            <tr>
                                <th>Students/Parents</th>
                                <th>{{ $data['studentTargetAudiences'] }}</th>
{{--                                <td>{{ $data['studentTotalCalled'] }}</td>--}}
                                <td>{{ $data['studentTotalCalled'] }}</td>
                                <td>{{ $studentTotal1 }}</td>
                                <td>{{ $data['studentTotalCallRecived'] }}</td>
                                <td>{{ $studentTotal2 }}</td>
                                <td>{{ $data['studentTotalCallCompleted'] }}</td>
                                <td>{{ $studentTotal3 }}</td>
                                <td>{{ $data['studentTotalCallFailed'] }}</td>
                                <td>{{ $studentTotal4 }}</td>
                                <td>{{ $data['studentTotalInboundCall'] }}</td>
                                <td>{{ $studentTotal5 }}</td>
                            </tr>

                            @php

                            $unspecefiedTotal1 = $unspecefiedTotal2 = $unspecefiedTotal3 = $unspecefiedTotal4 = $unspecefiedTotal5 = 0;


                                $unspecefiedTotal1 =($data['upspecifiedTargetAudiences'] != 0) ? round( ( $data['upspecifiedTotalCalled'] / $data['upspecifiedTargetAudiences'] ) * 100) : 0;

                                $unspecefiedTotal2 =($data['upspecifiedTotalCalled'] != 0 ) ? round( ( $data['upspecifiedTotalCallRecived'] / $data['upspecifiedTotalCalled'] ) * 100) : 0;

                                $unspecefiedTotal3 =($data['upspecifiedTotalCalled'] != 0 ) ? round(( $data['upspecifiedTotalCallCompleted'] / $data['upspecifiedTotalCalled'] ) * 100) : 0;

                                $unspecefiedTotal4 =($data['upspecifiedTotalCalled'] != 0 ) ? round(( $data['upspecifiedTotalCallFailed'] / $data['upspecifiedTotalCalled'] ) * 100) : 0;

                                $unspecefiedTotal5 =($data['upspecifiedTargetAudiences'] != 0) ? round(( $data['upspecifiedTotalInboundCall'] / $data['upspecifiedTargetAudiences'] ) * 100) : 0;


                            @endphp

                            <tr>
                                <th>Unspecified</th>
                                <th>{{ $data['upspecifiedTargetAudiences'] }}</th>
{{--                                <td>{{ $data['upspecifiedTotalCalled'] }}</td>--}}
                                <td>{{ $data['upspecifiedTotalCalled'] }}</td>
                                <td>{{ $unspecefiedTotal1 }}</td>
                                <td>{{ $data['upspecifiedTotalCallRecived'] }}</td>
                                <td>{{ $unspecefiedTotal2 }}</td>
                                <td>{{ $data['upspecifiedTotalCallCompleted'] }}</td>
                                <td>{{ $unspecefiedTotal3 }}</td>
                                <td>{{ $data['upspecifiedTotalCallFailed'] }}</td>
                                <td>{{ $unspecefiedTotal4 }}</td>
                                <td>{{ $data['upspecifiedTotalInboundCall'] }}</td>
                                <td>{{ $unspecefiedTotal5 }}</td>
                            </tr>

                            @php

                            $total0 = $data['staffTargetAudiences'] + $data['teacherTargetAudiences'] + $data['govtTargetAudiences'] + $data['studentTargetAudiences'] + $data['upspecifiedTargetAudiences'];

                            $total1 = $data['staffTotalCalled'] + $data['teacherTotalCalled'] + $data['govtTotalCalled'] + $data['studentTotalCalled'] + $data['upspecifiedTotalCalled'];

                            $total2 = $data['staffTotalCallRecived'] + $data['teacherTotalCallRecived'] + $data['govtTotalCallRecived'] + $data['studentTotalCallRecived'] + $data['upspecifiedTotalCallRecived'];

                            $total3 = $data['staffTotalCallCompleted'] + $data['teacherTotalCallCompleted'] + $data['govtTotalCallCompleted'] + $data['studentTotalCallCompleted'] + $data['upspecifiedTotalCallCompleted'];

                            $total4 = $data['staffTotalCallFailed'] + $data['teacherTotalCallFailed'] + $data['govtTotalCallFailed'] + $data['studentTotalCallFailed'] + + $data['upspecifiedTotalCallFailed'];

                            $total5 = $data['staffTotalInboundCalled'] + $data['teacherTotalInboundCalled'] + $data['govtTotalInboundCalled'] + $data['studentTotalInboundCall'] + + $data['upspecifiedTotalInboundCall'];

                            $total6 = $total7 = $total8 = $total9 = $total10 = 0;

                            if($total1 != 0) $total6 = ($total0 != 0) ? round( ($total1 / $total0) * 100 ) : 0;
                            if($total2 != 0) $total7 = ($total1 != 0) ? round( ($total2 / $total1) * 100 ) : 0;
                            if($total3 != 0) $total8 = ($total1 != 0) ? round( ($total3 / $total1) * 100 ) : 0;
                            if($total4 != 0) $total9 = ($total1 != 0) ? round( ($total4 / $total1) * 100 ) : 0;
                            if($total5 != 0) $total10 =($total0 != 0) ? round( ($total5 / $total0) * 100 ) : 0;

                            @endphp

                            <tr>
                                <th><b>Total</b></th>
                                <th>{{ $total0 }}</th>
{{--                                <th>{{ $total1 }}</th>--}}
                                <td>{{ $total1 }}</td>
                                <td>{{ $total6 }}</td>
                                <td>{{ $total2 }}</td>
                                <td>{{ $total7 }}</td>
                                <td>{{ $total3 }}</td>
                                <td>{{ $total8 }}</td>
                                <td>{{ $total4 }}</td>
                                <td>{{ $total9 }}</td>
                                <td>{{ $total5 }}</td>
                                <td>{{ $total10 }}</td>
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
