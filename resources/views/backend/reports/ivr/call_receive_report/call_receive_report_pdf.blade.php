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
                    <th colspan="6" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Time Range</th>
                </tr>

                <tr>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;"></th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">9 - 11</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">11 - 13</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">13 - 15</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">15 - 17</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">17 - 19</th>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Call Receive Success Percentage</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($receiveRangeOne, 2) }}%</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($receiveRangeTwo, 2) }}%</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($receiveRangeThree, 2) }}%</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($receiveRangeFour, 2) }}%</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($receiveRangeFive, 2) }}%</td>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Avg Call Duration Time (secs)</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($averageRangeOne) }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($averageRangeTwo) }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($averageRangeThree) }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($averageRangeFour) }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{ round($averageRangeFive) }}</td>
                </tr>

            </table>

            <br>
            <br>
            <footer>This report is generated from <a href="{{ URL::to('/') }}">{{\URL::to('/')}}</a></footer>
        </div>
    </div>
</div>
