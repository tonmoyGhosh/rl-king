<div class="card-body">
    <div class="col-md-12">
        <div class="table-responsive" style="text-align: center; font-family: Poppins, Helvetica, sans-serif;">
            <a href="#" class="logo">
                <img alt="Logo" src="{{ URL::to('/') }}/storage/logo/app_logo.png" class="page_speed_8658815 logo-img" style="object-fit: contain; max-width: 100%; width: 200px;">
            </a>
            @php $mydate = getdate(date("U"));@endphp

            @php $setting = \App\Models\Setting::select('company_name')->first(); @endphp
            <!-- <h2 class="company_name" style=" font-size:19.5px">{{ $setting->company_name }}</h2> -->

            @php $setting = \App\Models\Setting::select('company_address')->first(); @endphp
            <!-- <h5 class="company_address" style=" font-size: 14.95px">{{ $setting->company_address }}</h5> -->

            <h6 class="date" style="text-align: right; font-size: 13.975px;"><b>Report Generated At:</b> <span style="text-align: right; font-weight: 400; font-size: 17.975px;">{{"$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"}}</span> </h6>
            <h3 style="text-align:center; font-size: 17.55px;"><u>{{ $title }}</u></h3>
            <br>
            <table style="width: 100%; border-spacing: 0px; ">
                <tr>
                    <th style="text-align: left; padding:4px 0; ">Gender:</th>
                    <td style="text-align: left; padding:4px 0;">{{ $gender }}</td>
                    <th style="text-align: right; padding:4px 0;">Date From:</th>
                    <td style="text-align: right; padding:4px 0;">{{ $dateFrom }}</td>
                </tr>
                <tr style="height: 10px"></tr>
                <tr>
                    <th style="text-align: left; padding:4px 0;">Location:</th>
                    <td style="text-align: left; padding:4px 0;">{{ $location }}</td>
                    <th style="text-align: right; padding:4px 0; padding-right: 22px;">Date To:</th>
                    <td style="text-align: right; padding:4px 0;">{{ $dateTo }}</td>
                </tr>
            </table>

            <br>
            <br>


            <table style="width: 100%; border: 1px solid black; text-align: center; border-spacing: 0; ">

                <tr>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Area</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Target Audience</th>
{{--                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Total Number of Stakeholder</th>--}}
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Number of Calls Sent</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">%</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Number of Calls Received</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">%</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Number of Completed Calls</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">%</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Number of withdrawn before completing a call</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">%</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Number of inbound calls</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">%</th>
                </tr>
                @php

                    $area_Target_Audience =0;
                    $total_number_of_stakeholder = 0;
                    $number_of_calls_sent =0;
                    $number_of_calls_received =0;
                    $number_of_completed_calls=0;
                    $number_of_withdrawn_before_completing_a_call=0;
                    $number_of_inbound_calls=0;
                @endphp

                @foreach ($area as $item)
                        @if($item)
                            <tr>
                                @php

                                    $area_Target_Audience = $area_Target_Audience + ($areaTargetAudience[$item] ?? (int) "0");
                                    $total_number_of_stakeholder = $total_number_of_stakeholder + ($areaTotalCount[$item] ?? (int) "0");
                                    $number_of_calls_sent = $number_of_calls_sent + ($areaTotalCount[$item] ?? (int) "0");
                                    $number_of_calls_received = $number_of_calls_received + ($totalCallReceived[$item] ?? (int) "0");
                                    $number_of_completed_calls = $number_of_completed_calls + ($totalCallCompleted[$item] ?? (int) "0");
                                    $number_of_withdrawn_before_completing_a_call =$number_of_withdrawn_before_completing_a_call + ($totalCallFailed[$item] ?? (int) "0");
                                    $number_of_inbound_calls = $number_of_inbound_calls + ($totalInboundCall[$item] ?? (int) "0");
                                @endphp

                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$item}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($areaTargetAudience[$item] ?? (int) "0") }}</td>
{{--                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($areaTotalCount[$item] ?? (int) "0") }}</td>--}}
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($areaTotalCount[$item] ?? (int) "0") }}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{(($areaTargetAudience[$item]) ?? (int) "0") == (int) "0" ? 0 : round( (($areaTotalCount[$item] ?? (int) "0") / ($areaTargetAudience[$item])) * 100)}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($totalCallReceived[$item] ?? (int) "0")}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{(($areaTotalCount[$item]) ?? (int) "0") == (int) "0" ? 0 : round( (($totalCallReceived[$item] ?? (int) "0")/ ($areaTotalCount[$item]) ) * 100)}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$totalCallCompleted[$item] ?? (int) "0"}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{(($areaTotalCount[$item]) ?? (int) "0") == (int) "0" ? 0 : round( (($totalCallCompleted[$item] ?? (int) "0") / ($areaTotalCount[$item]) ) * 100)}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$totalCallFailed[$item] ?? (int) "0"}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{(($areaTotalCount[$item]) ?? (int) "0") == (int) "0" ? 0 : round( (($totalCallFailed[$item] ?? (int) "0") / ($areaTotalCount[$item]) ) * 100)}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$totalInboundCall[$item] ?? (int) "0"}}</td>
                                <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{(($areaTargetAudience[$item]) ?? (int) "0") == (int) "0" ? 0 : round( (($totalInboundCall[$item] ?? (int) "0") / ($areaTargetAudience[$item]) ) * 100)}}</td>
                            </tr>
                         @endif
                @endforeach
                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  "><b>Total</b></td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$area_Target_Audience}}</td>
{{--                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_number_of_stakeholder}}</td>--}}
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$number_of_calls_sent}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($area_Target_Audience != 0) ? round(($total_number_of_stakeholder / $area_Target_Audience) * 100) : 0}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$number_of_calls_received}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($number_of_calls_sent != 0) ? round(($number_of_calls_received / $number_of_calls_sent) * 100) : 0}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$number_of_completed_calls}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($number_of_calls_sent != 0) ? round(($number_of_completed_calls / $number_of_calls_sent) * 100) : 0}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$number_of_withdrawn_before_completing_a_call}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($number_of_calls_sent != 0) ? round(($number_of_withdrawn_before_completing_a_call / $number_of_calls_sent ) * 100) : 0}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$number_of_inbound_calls}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{($area_Target_Audience != 0) ? round(($number_of_inbound_calls / $area_Target_Audience ) * 100) : 0}}</td>

                    </tr>

            </table>



            <br>
            <br>
            <footer>This report is generated from <a href="{{ URL::to('/') }}">{{ URL::to('/') }}</a></footer>
        </div>
    </div>
</div>
