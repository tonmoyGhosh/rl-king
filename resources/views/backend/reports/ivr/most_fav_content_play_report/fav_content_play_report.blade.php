@extends('layouts.backend_app')

@section('title', 'Ivr Most Favourite Content Play Report')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title">{{ $title }}</h2>
                </div>

                @include('backend.reports.ivr.most_fav_content_play_report.filterSection')

                @if(session()->get('data'))

                    @php $data = session()->get('data'); @endphp

                <div class="card-body">

                    <form action="{{ route('ivr-most-favourite-content-play-report-generate-pdf') }}" method="POST">
                        @csrf

                        <input type="hidden" name="ivrStoryTotal" value="{{ $data['ivrStory']['total'] }}">
                        <input type="hidden" name="ivrStoryName" value="{{ $data['ivrStory']['name'] }}">
                        <input type="hidden" name="ivrStoryLink" value="{{ $data['ivrStory']['link'] }}">

                        <input type="hidden" name="ivrRiddleTotal" value="{{ $data['ivrRiddle']['total'] }}">
                        <input type="hidden" name="ivrRiddleName" value="{{ $data['ivrRiddle']['name'] }}">
                        <input type="hidden" name="ivrRiddleLink" value="{{ $data['ivrRiddle']['link'] }}">

                        <input type="hidden" name="ivrPoemTotal" value="{{ $data['ivrPoem']['total'] }}">
                        <input type="hidden" name="ivrPoemName" value="{{ $data['ivrPoem']['name'] }}">
                        <input type="hidden" name="ivrPoemLink" value="{{ $data['ivrPoem']['link'] }}">

                        <input type="hidden" name="ivrSongTotal" value="{{ $data['ivrSong']['total'] }}">
                        <input type="hidden" name="ivrSongName" value="{{ $data['ivrSong']['name'] }}">
                        <input type="hidden" name="ivrSongLink" value="{{ $data['ivrSong']['link'] }}">

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

                                <tr>
                                    <th>Content Category</th>
                                    <th>Total Play Count</th>
                                    <th>Most Favourite Content</th>
                                </tr>

                                <!-- Story Section Start -->
                                <tr>
                                    <td>Story</td>
                                    <td>{{ $data['ivrStory']['total'] }}</td>
                                    <td>{{ $data['ivrStory']['name'].' - '.$data['ivrStory']['link'] }}</td>
                                </tr>
                                <!-- Story Section Stop -->

                                <!-- Rhymes Section Start -->
                                <tr>
                                    <td>Rhymes</td>
                                    <td>{{ $data['ivrPoem']['total'] }}</td>
                                    <td>{{ $data['ivrPoem']['name'].' - '.$data['ivrPoem']['link'] }}</td>
                                </tr>
                                <!-- Rhymes Section Stop -->

                                <!-- Riddle Section Start -->
                                <tr>
                                    <td>Riddle</td>
                                    <td>{{ $data['ivrRiddle']['total'] }}</td>
                                    <td>{{ $data['ivrRiddle']['name'].' - '.$data['ivrRiddle']['link'] }}</td>
                                </tr>
                                <!-- Riddle Section Stop -->

                                <!-- Song Section Start -->
                                <tr>
                                    <td>Song</td>
                                    <td>{{ $data['ivrSong']['total'] }}</td>
                                    <td>{{ $data['ivrSong']['name'].' - '.$data['ivrSong']['link'] }}</td>
                                </tr>
                                <!-- Song Section Stop -->

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




