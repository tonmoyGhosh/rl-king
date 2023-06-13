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

                <!-- Story Section -->
                <tr>
                    <td rowspan="{{ count($ivrStories) + 1 }}" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Story</td>

                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Content Title</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Total Play Count</td>
                </tr>

                @foreach($ivrStories as $ivrStory)
                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrStory->title }}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ ($ivrStory->log_count) ? $ivrStory->log_count : 0 }}</td>
                    </tr>
                @endforeach

                <!-- Riddle Section -->
                 <tr>
                    <td rowspan="{{ count($ivrRiddles) + 1 }}" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Riddle</td>

                    <td style="display: none;"></td>
                </tr>

                @foreach($ivrRiddles as $key => $ivrRiddle)

                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrRiddle->title }}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ ($ivrRiddle->log_count) ? $ivrRiddle->log_count : 0 }}</td>
                    </tr>


                @endforeach

                <!-- Poem Section -->
                <tr>
                    <td rowspan="{{ count($ivrPoems) + 1 }}" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Rhymes</td>
                </tr>

                @foreach($ivrPoems as $ivrPoem)
                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrPoem->title }}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ ($ivrPoem->log_count) ? $ivrPoem->log_count : 0 }}</td>
                    </tr>
                @endforeach

                <!-- Song Section -->
                <tr>
                    <td rowspan="{{ count($ivrSongs) + 1 }}" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Song</td>
                </tr>

                @foreach($ivrSongs as $ivrSong)
                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ $ivrSong->title }}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">{{ ($ivrSong->log_count) ? $ivrSong->log_count : 0 }}</td>
                    </tr>
                @endforeach

            </table>

            <br>
            <br>
            <footer>This report is generated from <a href="{{ URL::to('/') }}">{{ URL::to('/') }}</a></footer>
        </div>
    </div>
</div>
