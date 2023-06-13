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
                        <td style="text-align: left; padding:4px 0;">{{$gender}}</td>
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
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; padding:0; font-size: 12px; padding:2px 0; ">Users</th>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Target Audience</th>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Total Completed</th>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Total Sent</th>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Content Link Sent</th>
                    <th colspan="8" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Call</th>
                    </tr>
                    <tr>
                        <th colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Story</th>
                        <th colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Rhyme</th>
                        <th colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Riddle</th>
                        <th colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Song</th>

                    </tr>

                    <tr>
                        <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Outbound</th>
                        <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Inbound</th>
                        <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Outbound</th>
                        <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Inbound</th>
                        <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Outbound</th>
                        <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Inbound</th>
                        <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Outbound</th>
                        <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Inbound</th>
                    </tr>

                    <tr>
                        <td style="border-bottom: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Students/Parents</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_sms_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_story_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_story_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_rhyme_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_rhyme_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_riddle_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_riddle_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_song_student}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_song_student}}</td>

                    </tr>

                    <tr>
                        <td style="border-bottom: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Teachers</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_sms_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_story_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_story_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_rhyme_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_rhyme_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_riddle_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_riddle_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_song_teacher}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_song_teacher}}</td>
                    </tr>

                    <tr>
                        <td style="border-bottom: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">Govt. Officials</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_sms_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_story_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_story_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_rhyme_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_rhyme_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_riddle_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_riddle_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_song_govt}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_song_govt}}</td>
                    </tr>

                    <tr>
                        <td style=" padding:0; font-size: 12px; padding:4px 0;  ">Room to Read staff</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_sms_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_story_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_story_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_rhyme_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_rhyme_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_riddle_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_riddle_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_song_staff}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_song_staff}}</td>
                    </tr>

                    <tr>
                        <td style=" padding:0; font-size: 12px; padding:4px 0;  border-top: 1px solid black;">Unspecified</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_other}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_unspecified_stakeholder}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_sms_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_story_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_story_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_rhyme_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_rhyme_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_riddle_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_riddle_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_outbound_song_unspecified}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_call_inbound_song_unspecified}}</td>
                    </tr>
            </table>

            <br>
            <br>

            <table style="width: 100%; border: 1px solid black; text-align: center;  border-spacing: 0px;">
                <tr>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Student/Parents</th>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Target Audience</th>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Total Completed</th>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Total Sent</th>
                    <th colspan="1" rowspan="3" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;">Content Link Sent</th>
                    <th colspan="8" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Call</th>
                </tr>
                <tr>
                    <th colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Story</th>
                    <th colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Rhyme</th>
                    <th colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Riddle</th>
                    <th colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Song</th>

                </tr>

                <tr>
                    <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Outbound</th>
                    <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Inbound</th>
                    <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Outbound</th>
                    <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Inbound</th>
                    <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Outbound</th>
                    <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Inbound</th>
                    <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Outbound</th>
                    <th colspan="1" style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0; ">Inbound</th>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid black; font-size: 12px; padding:4px 0;  ">Class 1</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_class1}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_class1}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_student_class1}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_sms_student}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_outbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_inbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_outbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_inbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_outbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_inbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_outbound_song}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class1_inbound_song}}</td>

                </tr>

                <tr>
                    <td style="border-bottom: 1px solid black; font-size: 12px; padding:4px 0;  ">Class 2</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_class2}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_class2}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_student_class2}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_sms_student}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_outbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_inbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_outbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_inbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_outbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_inbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_outbound_song}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class2_inbound_song}}</td>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid black; font-size: 12px; padding:4px 0;  ">Class 3</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_class3}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_class3}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_student_class3}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_sms_student}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_outbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_inbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_outbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_inbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_outbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_inbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_outbound_song}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class3_inbound_song}}</td>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid black;  padding:0; font-size: 12px; padding:4px 0;  ">Class 4</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_class4}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_class4}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_student_class4}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_sms_student}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_outbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_inbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_outbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_inbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_outbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_inbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_outbound_song}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class4_inbound_song}}</td>
                </tr>

                <tr>
                    <td style="  padding:0; font-size: 12px; padding:4px 0;  ">Class 5</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_class5}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_class5}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_student_class5}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_sms_student}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_outbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_inbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_outbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_inbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_outbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_inbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_outbound_song}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_class5_inbound_song}}</td>
                </tr>

                <tr>
                    <td style="  padding:0; font-size: 12px; padding:4px 0;  border-top: 1px solid black;">Class Unspecified</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$target_audience_unspecified}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_received_call_class_unspecified}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$total_student_class_unspecified}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_unspecified_sms_student}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_classUnspecified_outbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_classUnspecified_inbound_story}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_classUnspecified_outbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_classUnspecified_inbound_rhyme}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_classUnspecified_outbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_classUnspecified_inbound_riddle}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_classUnspecified_outbound_song}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black; padding:0; font-size: 12px; padding:4px 0;  ">{{$ivr_classUnspecified_inbound_song}}</td>
                </tr>
            </table>

            <br>
            <br>
            <footer>This report is generated from <a href="{{ URL::to('/') }}">{{ URL::to('/') }}</a></footer>
        </div>
    </div>
</div>
