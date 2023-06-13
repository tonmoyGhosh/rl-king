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
            <table style="width: 100%; border-spacing: 0px;">
                <tr>
                    <th style="text-align: left; padding:4px 0;">Date From:</th>
                    <td style="text-align: left; padding:4px 0;">{{ $dateFrom }}</td>
                    <th style="text-align: right; padding:4px 0; padding-right: 22px;">Date To:</th>
                    <td style="text-align: right; padding:4px 0;">{{ $dateTo }}</td>
                </tr>
            </table>

            <br>
            <br>

            <table style="width: 100%; border: 1px solid black; text-align: center; border-spacing: 0; ">


                <tr>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Content Category</th>

                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Total Play Count</th>
                    <th style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Most Favorite Content</th>
                </tr>

                <!-- Story Section -->
                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Story</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrStoryTotal }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrStoryName.' - '.$ivrStoryLink }}</td>
                </tr>


                <!-- Riddle Section -->
                 <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Riddle</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrRiddleTotal }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrRiddleName.' - '.$ivrRiddleLink }}</td>
                </tr>

                <!-- Rhymes Section -->
                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Rhymes</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrPoemTotal }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrPoemName.' - '.$ivrPoemLink }}</td>
                </tr>

                <!-- Song Section -->
                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Song</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrSongTotal }}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrSongName.' - '.$ivrSongLink }}</td>
                </tr>

            </table>

            <br>
            <br>
            <footer>This report is generated from <a href="{{ URL::to('/') }}">{{ URL::to('/') }}</a></footer>
        </div>
    </div>
</div>
