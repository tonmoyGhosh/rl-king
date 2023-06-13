@extends('layouts.backend_app')

@section('title', 'IVR Content Play Report')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title">{{ $title }}</h2>
                </div>

                @include('backend.reports.ivr.content_play_report.filterSection')

                @if(session()->get('data'))

                    @php $data = session()->get('data'); @endphp

                <div class="card-body">

                    <form action="{{ route('ivr-content-play-report-generate-pdf') }}" method="POST">
                        @csrf

                        <input type="hidden" name="ivrStories" value="{{ $data['ivrStories'] }}">
                        <input type="hidden" name="ivrRiddles" value="{{ $data['ivrRiddles'] }}">
                        <input type="hidden" name="ivrPoems" value="{{ $data['ivrPoems'] }}">
                        <input type="hidden" name="ivrSongs" value="{{ $data['ivrSongs'] }}">

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

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><b>Date From: </b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$data['dateFrom']}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 offset-md-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <p><b>Date To:</b></p>
                                        </div>
                                        <div class="col-6">
                                            <p>{{$data['dateTo']}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <br>
                            <br>

                            <table style="width: 100%">

                                <!-- Story Section -->
                                <tr>
                                    <td rowspan="{{ count($data['ivrStories']) + 1 }}">Story</td>
                                    <td>Content Title</td>
                                    <td>Total Play Count</td>
                                </tr>

                                @foreach($data['ivrStories'] as $ivrStory)
                                <tr>
                                    <td>{{ $ivrStory->title }}</td>
                                    <td>{{ ($ivrStory->log_count) ? $ivrStory->log_count : 0 }}</td>
                                </tr>
                                @endforeach

                                <!-- Riddle Section -->
                                <tr>
                                    <td rowspan="{{ count($data['ivrRiddles']) + 1 }}">Riddle</td>
                                </tr>

                                @foreach($data['ivrRiddles'] as $ivrRiddle)
                                <tr>
                                    <td>{{ $ivrRiddle->title }}</td>
                                    <td>{{ ($ivrRiddle->log_count) ? $ivrRiddle->log_count : 0 }}</td>
                                </tr>
                                @endforeach

                                <!-- Poem Section -->
                                <tr>
                                    <td rowspan="{{ count($data['ivrPoems']) + 1 }}">Rhymes</td>
                                </tr>

                                @foreach($data['ivrPoems'] as $ivrPoem)
                                <tr>
                                    <td>{{ $ivrPoem->title }}</td>
                                    <td>{{ ($ivrPoem->log_count) ? $ivrPoem->log_count : 0 }}</td>
                                </tr>
                                @endforeach

                                <!-- Song Section -->
                                <tr>
                                    <td rowspan="{{ count($data['ivrSongs']) + 1 }}">Song</td>
                                </tr>

                                @foreach($data['ivrSongs'] as $ivrSong)
                                <tr>
                                    <td>{{ $ivrSong->title }}</td>
                                    <td>{{ ($ivrSong->log_count) ? $ivrSong->log_count : 0 }}</td>
                                </tr>
                                @endforeach

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




