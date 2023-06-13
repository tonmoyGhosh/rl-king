@extends('layouts.backend_app')

@section('title', 'IVR Call Usages Report')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title">{{ $title }}</h2>
                </div>

                @include('backend.reports.ivr.usage_report.filterSection')

                @if(session()->get('data'))
                     @php $data = session()->get('data'); @endphp


                <div class="card-body">

                    <form action="{{ route('ivr-usage-report-generate-pdf') }}" method="POST">
                        @csrf

                        <input type="hidden" name="target_audience_student" value="{{ $data['target_audience_student'] }}">
                        <input type="hidden" name="total_student" value="{{ $data['total_student'] }}">
                        <input type="hidden" name="ivr_sms_student" value="{{ $data['ivr_sms_student'] }}">
                        <input type="hidden" name="ivr_call_inbound_story_student" value="{{ $data['ivr_call_inbound_story_student'] }}">
                        <input type="hidden" name="ivr_call_outbound_story_student" value="{{ $data['ivr_call_outbound_story_student'] }}">
                        <input type="hidden" name="ivr_call_inbound_rhyme_student" value="{{ $data['ivr_call_inbound_rhyme_student'] }}">
                        <input type="hidden" name="ivr_call_outbound_rhyme_student" value="{{ $data['ivr_call_outbound_rhyme_student'] }}">
                        <input type="hidden" name="ivr_call_inbound_riddle_student" value="{{ $data['ivr_call_inbound_riddle_student'] }}">
                        <input type="hidden" name="ivr_call_outbound_riddle_student" value="{{ $data['ivr_call_outbound_riddle_student'] }}">
                        <input type="hidden" name="ivr_call_inbound_song_student" value="{{ $data['ivr_call_inbound_song_student'] }}">
                        <input type="hidden" name="ivr_call_outbound_song_student" value="{{ $data['ivr_call_outbound_song_student'] }}">

                        <input type="hidden" name="target_audience_teacher" value="{{ $data['target_audience_teacher'] }}">
                        <input type="hidden" name="total_teacher" value="{{ $data['total_teacher'] }}">
                        <input type="hidden" name="ivr_sms_teacher" value="{{ $data['ivr_sms_teacher'] }}">
                        <input type="hidden" name="ivr_call_inbound_story_teacher" value="{{ $data['ivr_call_inbound_story_teacher'] }}">
                        <input type="hidden" name="ivr_call_outbound_story_teacher" value="{{ $data['ivr_call_outbound_story_teacher'] }}">
                        <input type="hidden" name="ivr_call_inbound_rhyme_teacher" value="{{ $data['ivr_call_inbound_rhyme_teacher'] }}">
                        <input type="hidden" name="ivr_call_outbound_rhyme_teacher" value="{{ $data['ivr_call_outbound_rhyme_teacher'] }}">
                        <input type="hidden" name="ivr_call_inbound_riddle_teacher" value="{{ $data['ivr_call_inbound_riddle_teacher'] }}">
                        <input type="hidden" name="ivr_call_outbound_riddle_teacher" value="{{ $data['ivr_call_outbound_riddle_teacher'] }}">
                        <input type="hidden" name="ivr_call_inbound_song_teacher" value="{{ $data['ivr_call_inbound_song_teacher'] }}">
                        <input type="hidden" name="ivr_call_outbound_song_teacher" value="{{ $data['ivr_call_outbound_song_teacher'] }}">

                        <input type="hidden" name="target_audience_govt" value="{{ $data['target_audience_govt'] }}">
                        <input type="hidden" name="total_govt" value="{{ $data['total_govt'] }}">
                        <input type="hidden" name="ivr_sms_govt" value="{{ $data['ivr_sms_govt'] }}">
                        <input type="hidden" name="ivr_call_inbound_story_govt" value="{{ $data['ivr_call_inbound_story_govt'] }}">
                        <input type="hidden" name="ivr_call_outbound_story_govt" value="{{ $data['ivr_call_outbound_story_govt'] }}">
                        <input type="hidden" name="ivr_call_inbound_rhyme_govt" value="{{ $data['ivr_call_inbound_rhyme_govt'] }}">
                        <input type="hidden" name="ivr_call_outbound_rhyme_govt" value="{{ $data['ivr_call_outbound_rhyme_govt'] }}">
                        <input type="hidden" name="ivr_call_inbound_riddle_govt" value="{{ $data['ivr_call_inbound_riddle_govt'] }}">
                        <input type="hidden" name="ivr_call_outbound_riddle_govt" value="{{ $data['ivr_call_outbound_riddle_govt'] }}">
                        <input type="hidden" name="ivr_call_inbound_song_govt" value="{{ $data['ivr_call_inbound_song_govt'] }}">
                        <input type="hidden" name="ivr_call_outbound_song_govt" value="{{ $data['ivr_call_outbound_song_govt'] }}">

                        <input type="hidden" name="target_audience_staff" value="{{ $data['target_audience_staff'] }}">
                        <input type="hidden" name="total_staff" value="{{ $data['total_staff'] }}">
                        <input type="hidden" name="ivr_sms_staff" value="{{ $data['ivr_sms_staff'] }}">
                        <input type="hidden" name="ivr_call_inbound_story_staff" value="{{ $data['ivr_call_inbound_story_staff'] }}">
                        <input type="hidden" name="ivr_call_outbound_story_staff" value="{{ $data['ivr_call_outbound_story_staff'] }}">
                        <input type="hidden" name="ivr_call_inbound_rhyme_staff" value="{{ $data['ivr_call_inbound_rhyme_staff'] }}">
                        <input type="hidden" name="ivr_call_outbound_rhyme_staff" value="{{ $data['ivr_call_outbound_rhyme_staff'] }}">
                        <input type="hidden" name="ivr_call_inbound_riddle_staff" value="{{ $data['ivr_call_inbound_riddle_staff'] }}">
                        <input type="hidden" name="ivr_call_outbound_riddle_staff" value="{{ $data['ivr_call_outbound_riddle_staff'] }}">
                        <input type="hidden" name="ivr_call_inbound_song_staff" value="{{ $data['ivr_call_inbound_song_staff'] }}">
                        <input type="hidden" name="ivr_call_outbound_song_staff" value="{{ $data['ivr_call_outbound_song_staff'] }}">

                        <input type="hidden" name="target_audience_other" value="{{ $data['target_audience_other'] }}">
                        <input type="hidden" name="total_unspecified_stakeholder" value="{{ $data['total_unspecified_stakeholder'] }}">
                        <input type="hidden" name="ivr_sms_unspecified" value="{{ $data['ivr_sms_unspecified'] }}">
                        <input type="hidden" name="ivr_call_inbound_story_unspecified" value="{{ $data['ivr_call_inbound_story_unspecified'] }}">
                        <input type="hidden" name="ivr_call_outbound_story_unspecified" value="{{ $data['ivr_call_outbound_story_unspecified'] }}">
                        <input type="hidden" name="ivr_call_inbound_rhyme_unspecified" value="{{ $data['ivr_call_inbound_rhyme_unspecified'] }}">
                        <input type="hidden" name="ivr_call_outbound_rhyme_unspecified" value="{{ $data['ivr_call_outbound_rhyme_unspecified'] }}">
                        <input type="hidden" name="ivr_call_inbound_riddle_unspecified" value="{{ $data['ivr_call_inbound_riddle_unspecified'] }}">
                        <input type="hidden" name="ivr_call_outbound_riddle_unspecified" value="{{ $data['ivr_call_outbound_riddle_unspecified'] }}">
                        <input type="hidden" name="ivr_call_inbound_song_unspecified" value="{{ $data['ivr_call_inbound_song_unspecified'] }}">
                        <input type="hidden" name="ivr_call_outbound_song_unspecified" value="{{ $data['ivr_call_outbound_song_unspecified'] }}">

                        <input type="hidden" name="target_audience_class1" value="{{ $data['target_audience_class1'] }}">
                        <input type="hidden" name="total_student_class1" value="{{ $data['total_student_class1'] }}">
                        <input type="hidden" name="ivr_class1_sms_student" value="{{ $data['ivr_class1_sms_student'] }}">
                        <input type="hidden" name="ivr_class1_inbound_story" value="{{ $data['ivr_class1_inbound_story'] }}">
                        <input type="hidden" name="ivr_class1_outbound_story" value="{{ $data['ivr_class1_outbound_story'] }}">
                        <input type="hidden" name="ivr_class1_inbound_rhyme" value="{{ $data['ivr_class1_inbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class1_outbound_rhyme" value="{{ $data['ivr_class1_outbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class1_inbound_riddle" value="{{ $data['ivr_class1_inbound_riddle'] }}">
                        <input type="hidden" name="ivr_class1_outbound_riddle" value="{{ $data['ivr_class1_outbound_riddle'] }}">
                        <input type="hidden" name="ivr_class1_inbound_song" value="{{ $data['ivr_class1_inbound_song'] }}">
                        <input type="hidden" name="ivr_class1_outbound_song" value="{{ $data['ivr_class1_outbound_song'] }}">

                        <input type="hidden" name="target_audience_class2" value="{{ $data['target_audience_class2'] }}">
                        <input type="hidden" name="total_student_class2" value="{{ $data['total_student_class2'] }}">
                        <input type="hidden" name="ivr_class2_sms_student" value="{{ $data['ivr_class2_sms_student'] }}">
                        <input type="hidden" name="ivr_class2_inbound_story" value="{{ $data['ivr_class2_inbound_story'] }}">
                        <input type="hidden" name="ivr_class2_outbound_story" value="{{ $data['ivr_class2_outbound_story'] }}">
                        <input type="hidden" name="ivr_class2_inbound_rhyme" value="{{ $data['ivr_class2_inbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class2_outbound_rhyme" value="{{ $data['ivr_class2_outbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class2_inbound_riddle" value="{{ $data['ivr_class2_inbound_riddle'] }}">
                        <input type="hidden" name="ivr_class2_outbound_riddle" value="{{ $data['ivr_class2_outbound_riddle'] }}">
                        <input type="hidden" name="ivr_class2_inbound_song" value="{{ $data['ivr_class2_inbound_song'] }}">
                        <input type="hidden" name="ivr_class2_outbound_song" value="{{ $data['ivr_class2_outbound_song'] }}">

                        <input type="hidden" name="target_audience_class3" value="{{ $data['target_audience_class3'] }}">
                        <input type="hidden" name="total_student_class3" value="{{ $data['total_student_class3'] }}">
                        <input type="hidden" name="ivr_class3_sms_student" value="{{ $data['ivr_class3_sms_student'] }}">
                        <input type="hidden" name="ivr_class3_inbound_story" value="{{ $data['ivr_class3_inbound_story'] }}">
                        <input type="hidden" name="ivr_class3_outbound_story" value="{{ $data['ivr_class3_outbound_story'] }}">
                        <input type="hidden" name="ivr_class3_inbound_rhyme" value="{{ $data['ivr_class3_inbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class3_outbound_rhyme" value="{{ $data['ivr_class3_outbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class3_inbound_riddle" value="{{ $data['ivr_class3_inbound_riddle'] }}">
                        <input type="hidden" name="ivr_class3_outbound_riddle" value="{{ $data['ivr_class3_outbound_riddle'] }}">
                        <input type="hidden" name="ivr_class3_inbound_song" value="{{ $data['ivr_class3_inbound_song'] }}">
                        <input type="hidden" name="ivr_class3_outbound_song" value="{{ $data['ivr_class3_outbound_song'] }}">

                        <input type="hidden" name="target_audience_class4" value="{{ $data['target_audience_class4'] }}">
                        <input type="hidden" name="total_student_class4" value="{{ $data['total_student_class4'] }}">
                        <input type="hidden" name="ivr_class4_sms_student" value="{{ $data['ivr_class4_sms_student'] }}">
                        <input type="hidden" name="ivr_class4_inbound_story" value="{{ $data['ivr_class4_inbound_story'] }}">
                        <input type="hidden" name="ivr_class4_outbound_story" value="{{ $data['ivr_class4_outbound_story'] }}">
                        <input type="hidden" name="ivr_class4_inbound_rhyme" value="{{ $data['ivr_class4_inbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class4_outbound_rhyme" value="{{ $data['ivr_class4_outbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class4_inbound_riddle" value="{{ $data['ivr_class4_inbound_riddle'] }}">
                        <input type="hidden" name="ivr_class4_outbound_riddle" value="{{ $data['ivr_class4_outbound_riddle'] }}">
                        <input type="hidden" name="ivr_class4_inbound_song" value="{{ $data['ivr_class4_inbound_song'] }}">
                        <input type="hidden" name="ivr_class4_outbound_song" value="{{ $data['ivr_class4_outbound_song'] }}">

                        <input type="hidden" name="target_audience_class5" value="{{ $data['target_audience_class5'] }}">
                        <input type="hidden" name="total_student_class5" value="{{ $data['total_student_class5'] }}">
                        <input type="hidden" name="ivr_class5_sms_student" value="{{ $data['ivr_class5_sms_student'] }}">
                        <input type="hidden" name="ivr_class5_inbound_story" value="{{ $data['ivr_class5_inbound_story'] }}">
                        <input type="hidden" name="ivr_class5_outbound_story" value="{{ $data['ivr_class5_outbound_story'] }}">
                        <input type="hidden" name="ivr_class5_inbound_rhyme" value="{{ $data['ivr_class5_inbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class5_outbound_rhyme" value="{{ $data['ivr_class5_outbound_rhyme'] }}">
                        <input type="hidden" name="ivr_class5_inbound_riddle" value="{{ $data['ivr_class5_inbound_riddle'] }}">
                        <input type="hidden" name="ivr_class5_outbound_riddle" value="{{ $data['ivr_class5_outbound_riddle'] }}">
                        <input type="hidden" name="ivr_class5_inbound_song" value="{{ $data['ivr_class5_inbound_song'] }}">
                        <input type="hidden" name="ivr_class5_outbound_song" value="{{ $data['ivr_class5_outbound_song'] }}">

                        <input type="hidden" name="target_audience_unspecified" value="{{ $data['target_audience_unspecified'] }}">
                        <input type="hidden" name="total_student_class_unspecified" value="{{ $data['total_student_class_unspecified'] }}">
                        <input type="hidden" name="ivr_unspecified_sms_student" value="{{ $data['ivr_unspecified_sms_student'] }}">
                        <input type="hidden" name="ivr_classUnspecified_outbound_story" value="{{ $data['ivr_classUnspecified_outbound_story'] }}">
                        <input type="hidden" name="ivr_classUnspecified_inbound_story" value="{{ $data['ivr_classUnspecified_inbound_story'] }}">
                        <input type="hidden" name="ivr_classUnspecified_outbound_rhyme" value="{{ $data['ivr_classUnspecified_outbound_rhyme'] }}">
                        <input type="hidden" name="ivr_classUnspecified_inbound_rhyme" value="{{ $data['ivr_classUnspecified_inbound_rhyme'] }}">
                        <input type="hidden" name="ivr_classUnspecified_outbound_riddle" value="{{ $data['ivr_classUnspecified_outbound_riddle'] }}">
                        <input type="hidden" name="ivr_classUnspecified_inbound_riddle" value="{{ $data['ivr_classUnspecified_inbound_riddle'] }}">
                        <input type="hidden" name="ivr_classUnspecified_outbound_song" value="{{ $data['ivr_classUnspecified_outbound_song'] }}">
                        <input type="hidden" name="ivr_classUnspecified_inbound_song" value="{{ $data['ivr_classUnspecified_inbound_song'] }}">


                        <input type="hidden" name="total_received_call_student" value="{{ $data['total_received_call_student'] }}">
                        <input type="hidden" name="total_received_call_teacher" value="{{ $data['total_received_call_teacher'] }}">
                        <input type="hidden" name="total_received_call_govt" value="{{ $data['total_received_call_govt'] }}">
                        <input type="hidden" name="total_received_call_staff" value="{{ $data['total_received_call_staff'] }}">
                        <input type="hidden" name="total_received_call_unspecified" value="{{ $data['total_received_call_unspecified'] }}">

                        <input type="hidden" name="total_received_call_class1" value="{{ $data['total_received_call_class1'] }}">
                        <input type="hidden" name="total_received_call_class2" value="{{ $data['total_received_call_class2'] }}">
                        <input type="hidden" name="total_received_call_class3" value="{{ $data['total_received_call_class3'] }}">
                        <input type="hidden" name="total_received_call_class4" value="{{ $data['total_received_call_class4'] }}">
                        <input type="hidden" name="total_received_call_class5" value="{{ $data['total_received_call_class5'] }}">
                        <input type="hidden" name="total_received_call_class_unspecified" value="{{ $data['total_received_call_class_unspecified'] }}">


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
                                    <img alt="Logo" src="{{asset('metch')}}/media/logos/app_logo.png" class="page_speed_8658815 logo-img" >
                                </a>
                            @else
                                <a href="#"  class="logo">
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
                                        <div class="col-6">
                                            <p><b>Gender: </b></p>
                                            <p><b>Location: </b></p>
                                        </div>
                                        <div class="col-6">
                                            <p>{{$data['gender']}}</p>
                                            <p>{{$data['location']}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 offset-md-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <p><b>Date From:</b></p>
                                            <p><b>Date To:</b></p>
                                        </div>
                                        <div class="col-6">
                                            <p>{{$data['dateFrom']}}</p>
                                            <p>{{$data['dateTo']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <table style="width: 100%">
                                <tr>
                                    <th colspan="1" rowspan="3">Users</th>
                                    <th colspan="1" rowspan="3">Target Audience</th>
                                    <th colspan="1" rowspan="3">Total Completed</th>
                                    <th colspan="1" rowspan="3">Total Sent</th>
                                    <th colspan="1" rowspan="3">Content Link Sent</th>
                                    <th colspan="8">Call</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Story</th>
                                    <th colspan="2">Rhyme</th>
                                    <th colspan="2">Riddle</th>
                                    <th colspan="2">Song</th>

                                </tr>

                                <tr>
                                    <th colspan="1">Outbound</th>
                                    <th colspan="1">Inbound</th>
                                    <th colspan="1">Outbound</th>
                                    <th colspan="1">Inbound</th>
                                    <th colspan="1">Outbound</th>
                                    <th colspan="1">Inbound</th>
                                    <th colspan="1">Outbound</th>
                                    <th colspan="1">Inbound</th>
                                </tr>

                                <tr>
                                    <td>Students/Parents</td>
                                    <td>{{$data['target_audience_student']}}</td>
                                    <td>{{$data['total_received_call_student']}}</td>
                                    <td>{{$data['total_student']}}</td>
                                    <td>{{$data['ivr_sms_student']}}</td>
                                    <td>{{$data['ivr_call_outbound_story_student']}}</td>
                                    <td>{{$data['ivr_call_inbound_story_student']}}</td>
                                    <td>{{$data['ivr_call_outbound_rhyme_student']}}</td>
                                    <td>{{$data['ivr_call_inbound_rhyme_student']}}</td>
                                    <td>{{$data['ivr_call_outbound_riddle_student']}}</td>
                                    <td>{{$data['ivr_call_inbound_riddle_student']}}</td>
                                    <td>{{$data['ivr_call_outbound_song_student']}}</td>
                                    <td>{{$data['ivr_call_inbound_song_student']}}</td>
                                </tr>

                                <tr>
                                    <td>Teachers</td>
                                    <td>{{$data['target_audience_teacher']}}</td>
                                    <td>{{$data['total_received_call_teacher']}}</td>
                                    <td>{{$data['total_teacher']}}</td>
                                    <td>{{$data['ivr_sms_teacher']}}</td>
                                    <td>{{$data['ivr_call_outbound_story_teacher']}}</td>
                                    <td>{{$data['ivr_call_inbound_story_teacher']}}</td>
                                    <td>{{$data['ivr_call_outbound_rhyme_teacher']}}</td>
                                    <td>{{$data['ivr_call_inbound_rhyme_teacher']}}</td>
                                    <td>{{$data['ivr_call_outbound_riddle_teacher']}}</td>
                                    <td>{{$data['ivr_call_inbound_riddle_teacher']}}</td>
                                    <td>{{$data['ivr_call_outbound_song_teacher']}}</td>
                                    <td>{{$data['ivr_call_inbound_song_teacher']}}</td>
                                </tr>

                                <tr>
                                    <td>Govt. Officials</td>
                                    <td>{{$data['target_audience_govt']}}</td>
                                    <td>{{$data['total_received_call_govt']}}</td>
                                    <td>{{$data['total_govt']}}</td>
                                    <td>{{$data['ivr_sms_govt']}}</td>
                                    <td>{{$data['ivr_call_outbound_story_govt']}}</td>
                                    <td>{{$data['ivr_call_inbound_story_govt']}}</td>
                                    <td>{{$data['ivr_call_outbound_rhyme_govt']}}</td>
                                    <td>{{$data['ivr_call_inbound_rhyme_govt']}}</td>
                                    <td>{{$data['ivr_call_outbound_riddle_govt']}}</td>
                                    <td>{{$data['ivr_call_inbound_riddle_govt']}}</td>
                                    <td>{{$data['ivr_call_outbound_song_govt']}}</td>
                                    <td>{{$data['ivr_call_inbound_song_govt']}}</td>
                                </tr>

                                <tr>
                                    <td>Room to Read staff</td>
                                    <td>{{$data['target_audience_staff']}}</td>
                                    <td>{{$data['total_received_call_staff']}}</td>
                                    <td>{{$data['total_staff']}}</td>
                                    <td>{{$data['ivr_sms_staff']}}</td>
                                    <td>{{$data['ivr_call_outbound_story_staff']}}</td>
                                    <td>{{$data['ivr_call_inbound_story_staff']}}</td>
                                    <td>{{$data['ivr_call_outbound_rhyme_staff']}}</td>
                                    <td>{{$data['ivr_call_inbound_rhyme_staff']}}</td>
                                    <td>{{$data['ivr_call_outbound_riddle_staff']}}</td>
                                    <td>{{$data['ivr_call_inbound_riddle_staff']}}</td>
                                    <td>{{$data['ivr_call_outbound_song_staff']}}</td>
                                    <td>{{$data['ivr_call_inbound_song_staff']}}</td>
                                </tr>

                                <tr>
                                    <td>Unspecified</td>
                                    <td>{{$data['target_audience_other']}}</td>
                                    <td>{{$data['total_received_call_unspecified']}}</td>
                                    <td>{{$data['total_unspecified_stakeholder']}}</td>
                                    <td>{{$data['ivr_sms_unspecified']}}</td>
                                    <td>{{$data['ivr_call_outbound_story_unspecified']}}</td>
                                    <td>{{$data['ivr_call_inbound_story_unspecified']}}</td>
                                    <td>{{$data['ivr_call_outbound_rhyme_unspecified']}}</td>
                                    <td>{{$data['ivr_call_inbound_rhyme_unspecified']}}</td>
                                    <td>{{$data['ivr_call_outbound_riddle_unspecified']}}</td>
                                    <td>{{$data['ivr_call_inbound_riddle_unspecified']}}</td>
                                    <td>{{$data['ivr_call_outbound_song_unspecified']}}</td>
                                    <td>{{$data['ivr_call_inbound_song_unspecified']}}</td>
                                </tr>

                            </table>

                            <br>
                            <br>

                            <table style="width: 100%">
                                <tr>
                                    <th colspan="1" rowspan="3">Student/Parents</th>
                                    <th colspan="1" rowspan="3">Target Audience</th>
                                    <th colspan="1" rowspan="3">Total Completed</th>
                                    <th colspan="1" rowspan="3">Total Sent</th>
                                    <th colspan="1" rowspan="3">Content Link Sent</th>
                                    <th colspan="8">Call</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Story</th>
                                    <th colspan="2">Rhyme</th>
                                    <th colspan="2">Riddle</th>
                                    <th colspan="2">Song</th>

                                </tr>

                                <tr>
                                    <th colspan="1">Outbound</th>
                                    <th colspan="1">Inbound</th>
                                    <th colspan="1">Outbound</th>
                                    <th colspan="1">Inbound</th>
                                    <th colspan="1">Outbound</th>
                                    <th colspan="1">Inbound</th>
                                    <th colspan="1">Outbound</th>
                                    <th colspan="1">Inbound</th>
                                </tr>

                                <tr>
                                    <td>Class 1</td>
                                    <td>{{$data['target_audience_class1']}}</td>
                                    <td>{{$data['total_received_call_class1']}}</td>
                                    <td>{{$data['total_student_class1']}}</td>
                                    <td>{{$data['ivr_class1_sms_student']}}</td>
                                    <td>{{$data['ivr_class1_outbound_story']}}</td>
                                    <td>{{$data['ivr_class1_inbound_story']}}</td>
                                    <td>{{$data['ivr_class1_outbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class1_inbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class1_outbound_riddle']}}</td>
                                    <td>{{$data['ivr_class1_inbound_riddle']}}</td>
                                    <td>{{$data['ivr_class1_outbound_song']}}</td>
                                    <td>{{$data['ivr_class1_inbound_song']}}</td>
                                </tr>

                                <tr>
                                    <td>Class 2</td>
                                    <td>{{$data['target_audience_class2']}}</td>
                                    <td>{{$data['total_received_call_class2']}}</td>
                                    <td>{{$data['total_student_class2']}}</td>
                                    <td>{{$data['ivr_class2_sms_student']}}</td>
                                    <td>{{$data['ivr_class2_outbound_story']}}</td>
                                    <td>{{$data['ivr_class2_inbound_story']}}</td>
                                    <td>{{$data['ivr_class2_outbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class2_inbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class2_outbound_riddle']}}</td>
                                    <td>{{$data['ivr_class2_inbound_riddle']}}</td>
                                    <td>{{$data['ivr_class2_outbound_song']}}</td>
                                    <td>{{$data['ivr_class2_inbound_song']}}</td>
                                </tr>

                                <tr>
                                    <td>Class 3</td>
                                    <td>{{$data['target_audience_class3']}}</td>
                                    <td>{{$data['total_received_call_class3']}}</td>
                                    <td>{{$data['total_student_class3']}}</td>
                                    <td>{{$data['ivr_class3_sms_student']}}</td>
                                    <td>{{$data['ivr_class3_outbound_story']}}</td>
                                    <td>{{$data['ivr_class3_inbound_story']}}</td>
                                    <td>{{$data['ivr_class3_outbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class3_inbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class3_outbound_riddle']}}</td>
                                    <td>{{$data['ivr_class3_inbound_riddle']}}</td>
                                    <td>{{$data['ivr_class3_outbound_song']}}</td>
                                    <td>{{$data['ivr_class3_inbound_song']}}</td>
                                </tr>

                                <tr>
                                    <td>Class 4</td>
                                    <td>{{$data['target_audience_class4']}}</td>
                                    <td>{{$data['total_received_call_class4']}}</td>
                                    <td>{{$data['total_student_class4']}}</td>
                                    <td>{{$data['ivr_class4_sms_student']}}</td>
                                    <td>{{$data['ivr_class4_outbound_story']}}</td>
                                    <td>{{$data['ivr_class4_inbound_story']}}</td>
                                    <td>{{$data['ivr_class4_outbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class4_inbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class4_outbound_riddle']}}</td>
                                    <td>{{$data['ivr_class4_inbound_riddle']}}</td>
                                    <td>{{$data['ivr_class4_outbound_song']}}</td>
                                    <td>{{$data['ivr_class4_inbound_song']}}</td>
                                </tr>

                                <tr>
                                    <td>Class 5</td>
                                    <td>{{$data['target_audience_class5']}}</td>
                                    <td>{{$data['total_received_call_class5']}}</td>
                                    <td>{{$data['total_student_class5']}}</td>
                                    <td>{{$data['ivr_class5_sms_student']}}</td>
                                    <td>{{$data['ivr_class5_outbound_story']}}</td>
                                    <td>{{$data['ivr_class5_inbound_story']}}</td>
                                    <td>{{$data['ivr_class5_outbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class5_inbound_rhyme']}}</td>
                                    <td>{{$data['ivr_class5_outbound_riddle']}}</td>
                                    <td>{{$data['ivr_class5_inbound_riddle']}}</td>
                                    <td>{{$data['ivr_class5_outbound_song']}}</td>
                                    <td>{{$data['ivr_class5_inbound_song']}}</td>
                                </tr>

                                <tr>
                                    <td>Class Unspecified</td>
                                    <td>{{$data['target_audience_unspecified']}}</td>
                                    <td>{{$data['total_received_call_class_unspecified']}}</td>
                                    <td>{{$data['total_student_class_unspecified']}}</td>
                                    <td>{{$data['ivr_unspecified_sms_student']}}</td>
                                    <td>{{$data['ivr_classUnspecified_outbound_story']}}</td>
                                    <td>{{$data['ivr_classUnspecified_inbound_story']}}</td>
                                    <td>{{$data['ivr_classUnspecified_outbound_rhyme']}}</td>
                                    <td>{{$data['ivr_classUnspecified_inbound_rhyme']}}</td>
                                    <td>{{$data['ivr_classUnspecified_outbound_riddle']}}</td>
                                    <td>{{$data['ivr_classUnspecified_inbound_riddle']}}</td>
                                    <td>{{$data['ivr_classUnspecified_outbound_song']}}</td>
                                    <td>{{$data['ivr_classUnspecified_inbound_song']}}</td>
                                </tr>
                            </table>

                            <br>
                            <br>
                            @php $setting = \App\Models\Setting::select('company_name')->first(); @endphp
                            <footer>This report is generated from <a href="{{\URL::to('/')}}">{{\URL::to('/')}}</a></footer>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>



@endsection




