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

            <h6 class="date" style="text-align: right; font-size: 13.975px;"><b>Report Generated At:</b> <span  style="text-align: right; font-weight: 400; font-size: 17.975px;">{{"$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"}}</span> </h6>
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
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Profession</th>
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

                    $staffTotal1 = $staffTotal2 = $staffTotal3 = $staffTotal4 = $staffTotal5 = 0;

                    $staffTotal1 =($staffTargetAudiences != 0) ? round(( $staffTotalCalled / $staffTargetAudiences ) * 100) : 0;

                    $staffTotal2 =($staffTotalCalled != 0) ? round(( $staffTotalCallRecived / $staffTotalCalled  ) * 100) : 0;

                    $staffTotal3 =($staffTotalCalled != 0) ? round(( $staffTotalCallCompleted / $staffTotalCalled  ) * 100) : 0;

                    $staffTotal4 =($staffTotalCalled != 0) ? round(( $staffTotalCallFailed  / $staffTotalCalled  ) * 100) : 0;

                    $staffTotal5 =($staffTargetAudiences != 0) ? round(( $staffTotalInboundCalled / $staffTargetAudiences  ) * 100) : 0;


                @endphp

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Staff</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTargetAudiences }}</td>
{{--                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotalCalled }}</td>--}}
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotalCalled }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotal1 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotalCallRecived }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotal2 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotalCallCompleted }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotal3 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotalCallFailed }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotal4 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotalInboundCalled }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $staffTotal5 }}</td>
                </tr>

                @php

                    $teahcerTotal1 = $teahcerTotal2 = $teahcerTotal3 = $teahcerTotal4 = $teahcerTotal5 = 0;

                    $teahcerTotal1 =($teacherTargetAudiences != 0) ? round(( $teacherTotalCalled / $teacherTargetAudiences ) * 100) : 0;

                    $teahcerTotal2 =($teacherTotalCalled != 0) ? round(( $teacherTotalCallRecived / $teacherTotalCalled  ) * 100) : 0;

                    $teahcerTotal3 =($teacherTotalCalled != 0) ? round(( $teacherTotalCallCompleted / $teacherTotalCalled  ) * 100) : 0;

                    $teahcerTotal4 =($teacherTotalCalled != 0) ? round(( $teacherTotalCallFailed / $teacherTotalCalled  ) * 100) : 0;

                    $teahcerTotal5 =($teacherTargetAudiences != 0) ? round(( $teacherTotalInboundCalled / $teacherTargetAudiences  ) * 100) : 0;


                @endphp

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Teacher</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teacherTargetAudiences }}</td>
{{--                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teacherTotalCalled }}</td>--}}
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teacherTotalCalled }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teahcerTotal1 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teacherTotalCallRecived }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teahcerTotal2 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teacherTotalCallCompleted }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teahcerTotal3 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teacherTotalCallFailed }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teahcerTotal4 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teacherTotalInboundCalled }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $teahcerTotal5 }}</td>
                </tr>

                @php

                    $govtTotal1 = $govtTotal2 = $govtTotal3 = $govtTotal4 = $govtTotal5 = 0;

                    $govtTotal1 =($govtTargetAudiences != 0) ? round(( $govtTotalCalled / $govtTargetAudiences ) * 100) : 0;

                    $govtTotal2 =($govtTotalCalled != 0) ? round(( $govtTotalCallRecived / $govtTotalCalled  ) * 100) : 0;

                    $govtTotal3 =($govtTotalCalled != 0) ? round(( $govtTotalCallCompleted / $govtTotalCalled  ) * 100) : 0;

                    $govtTotal4 =($govtTotalCalled != 0) ? round(( $govtTotalCallFailed / $govtTotalCalled  ) * 100) : 0;

                    $govtTotal5 =($govtTargetAudiences != 0) ? round(( $govtTotalInboundCalled / $govtTargetAudiences  ) * 100) : 0;



                @endphp

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Govt Officials</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTargetAudiences }}</td>
{{--                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotalCalled }}</td>--}}
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotalCalled }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotal1 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotalCallRecived }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotal2 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotalCallCompleted }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotal3 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotalCallFailed }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotal4 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotalInboundCalled }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $govtTotal5 }}</td>
                </tr>

                @php

                    $studentTotal1 = $studentTotal2 = $studentTotal3 = $studentTotal4 = $studentTotal5 = 0;

                    $studentTotal1 =($studentTargetAudiences != 0) ? round( ( $studentTotalCalled / $studentTargetAudiences ) * 100) : 0;

                    $studentTotal2 =($studentTotalCalled != 0) ? round( ( $studentTotalCallRecived / $studentTotalCalled ) * 100) : 0;

                    $studentTotal3 =($studentTotalCalled != 0) ? round(( $studentTotalCallCompleted / $studentTotalCalled ) * 100) : 0;

                    $studentTotal4 =($studentTotalCalled != 0) ? round(( $studentTotalCallFailed / $studentTotalCalled ) * 100) : 0;

                    $studentTotal5 =($studentTargetAudiences != 0) ? round(( $studentTotalInboundCall / $studentTargetAudiences ) * 100) : 0;


                @endphp

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Students/Parents</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTargetAudiences }}</td>
{{--                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotalCalled }}</td>--}}
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotalCalled }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotal1 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotalCallRecived }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotal2 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotalCallCompleted }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotal3 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotalCallFailed }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotal4 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotalInboundCall }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $studentTotal5 }}</td>
                </tr>

                @php

                    $unspecefiedTotal1 = $unspecefiedTotal2 = $unspecefiedTotal3 = $unspecefiedTotal4 = $unspecefiedTotal5 = 0;

                    $unspecefiedTotal1 =($upspecifiedTargetAudiences != 0) ? round( ( $upspecifiedTotalCalled / $upspecifiedTargetAudiences ) * 100) : 0;

                    $unspecefiedTotal2 =($upspecifiedTotalCalled != 0) ? round( ( $upspecifiedTotalCallRecived / $upspecifiedTotalCalled ) * 100) : 0;

                    $unspecefiedTotal3 =($upspecifiedTotalCalled != 0) ? round(( $upspecifiedTotalCallCompleted / $upspecifiedTotalCalled ) * 100) : 0;

                    $unspecefiedTotal4 =($upspecifiedTotalCalled != 0) ? round(( $upspecifiedTotalCallFailed / $upspecifiedTotalCalled ) * 100) : 0;

                    $unspecefiedTotal5 =($upspecifiedTargetAudiences != 0) ? round(( $upspecifiedTotalInboundCall / $upspecifiedTargetAudiences ) * 100) : 0;


                @endphp

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Unspecified</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $upspecifiedTargetAudiences }}</td>
{{--                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $upspecifiedTotalCalled }}</td>--}}
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $upspecifiedTotalCalled }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $unspecefiedTotal1 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $upspecifiedTotalCallRecived }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $unspecefiedTotal2 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $upspecifiedTotalCallCompleted }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $unspecefiedTotal3 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $upspecifiedTotalCallFailed }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $unspecefiedTotal4 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $upspecifiedTotalInboundCall }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $unspecefiedTotal5 }}</td>
                </tr>


                @php

                    $total0 = $staffTargetAudiences + $teacherTargetAudiences + $govtTargetAudiences + $studentTargetAudiences + $upspecifiedTargetAudiences;

                    $total1 = $staffTotalCalled + $teacherTotalCalled + $govtTotalCalled + $studentTotalCalled + $upspecifiedTotalCalled;

                    $total2 = $staffTotalCallRecived + $teacherTotalCallRecived + $govtTotalCallRecived + $studentTotalCallRecived + $upspecifiedTotalCallRecived;

                    $total3 = $staffTotalCallCompleted + $teacherTotalCallCompleted + $govtTotalCallCompleted + $studentTotalCallCompleted + $upspecifiedTotalCallCompleted;

                    $total4 = $staffTotalCallFailed + $teacherTotalCallFailed + $govtTotalCallFailed + $studentTotalCallFailed + $upspecifiedTotalCallFailed;

                    $total5 = $staffTotalInboundCalled + $teacherTotalInboundCalled + $govtTotalInboundCalled + $studentTotalInboundCall + $upspecifiedTotalInboundCall;

                    $total6 = $total7 = $total8 = $total9 = $total10 = 0;

                    if($total1 != 0) $total6 = ($total0 != 0) ? round( ($total1 / $total0) * 100 ) : 0;
                    if($total2 != 0) $total7 = ($total1 != 0) ? round( ($total2 / $total1) * 100 ) : 0;
                    if($total3 != 0) $total8 = ($total1 != 0) ? round( ($total3 / $total1) * 100 ) : 0;
                    if($total4 != 0) $total9 = ($total1 != 0) ? round( ($total4 / $total1) * 100 ) : 0;
                    if($total5 != 0) $total10 =($total0 != 0) ? round( ($total5 / $total0) * 100 ) : 0;

                @endphp

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  "><b>Total</b></td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total0 }}</td>
{{--                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total1 }}</td>--}}
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total1 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total6 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total2 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total7 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total3 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total8 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total4 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total9 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total5 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $total10 }}</td>
                </tr>

            </table>

            <br>
            <br>
            <footer>This report is generated from <a href="{{ URL::to('/') }}">{{ URL::to('/') }}</a></footer>
        </div>
    </div>
</div>
