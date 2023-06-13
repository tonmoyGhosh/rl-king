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
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">No of SMS Sent (Recipient)</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">%</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Deliverd</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">%</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Failed</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">%</th>
                </tr>

                @php 
                    $totalTargetAudience = $totalSent = $totalDeliver = $totalFail = 0;
                @endphp

                @foreach ($area as $item)

                    @if($item)
                        @php
                            $totalTargetAudience = $totalTargetAudience + $smsTargetAudiencesAreaWise[$item];
                            $totalSent = $totalSent + $smsSent[$item];
                            $totalDeliver = $totalDeliver + $smsDelivered[$item];
                            $totalFail = $totalFail + $smsFailed[$item];
                        @endphp

                        <tr>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $item }}</td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $smsTargetAudiencesAreaWise[$item] }}</td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $smsSent[$item] }}</td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ ($smsTargetAudiencesAreaWise[$item] != 0) ? round(($smsSent[$item] / $smsTargetAudiencesAreaWise[$item]) * 100) : 0 }}</td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $smsDelivered[$item] }}</td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ ($smsTargetAudiencesAreaWise[$item] != 0) ? round(($smsDelivered[$item] / $smsTargetAudiencesAreaWise[$item]) * 100) : 0 }}</td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $smsFailed[$item] }}</td>
                            <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ ($smsTargetAudiencesAreaWise[$item] != 0) ? round(($smsFailed[$item] / $smsTargetAudiencesAreaWise[$item]) * 100) : 0 }}</td>
                        </tr>
                        
                    @endif

                @endforeach

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  "><b>Total</b></td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $totalTargetAudience }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $totalSent }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ ($totalTargetAudience != 0) ? round(($totalSent / $totalTargetAudience) * 100) : 0 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $totalDeliver }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ ($totalTargetAudience != 0) ? round(($totalDeliver / $totalTargetAudience) * 100) : 0 }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ $totalFail }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ ($totalTargetAudience != 0) ? round(($totalFail / $totalTargetAudience) * 100) : 0 }}</td>
                </tr>
        
            </table>
            
            <br>
            <br>
            <footer>This report is generated from <a href="{{ URL::to('/') }}">{{ URL::to('/') }}</a></footer>
        </div>
    </div>
</div>
