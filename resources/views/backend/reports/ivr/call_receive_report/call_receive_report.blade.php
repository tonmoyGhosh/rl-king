@extends('layouts.backend_app')

@section('title', 'IVR Call Receive Report')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2 class="card-title">{{ $title }}</h2>
            </div>

            @include('backend.reports.ivr.call_receive_report.filterSection')

            @if(session()->get('data'))
            @php $data = session()->get('data'); @endphp
            <div class="card-body">

                <form action="{{ route('ivr-call-receive-report-generate-pdf') }}" method="POST">
                    @csrf

                    <input type="hidden" name="receiveRangeOne" value="{{ $data['receiveRangeOne'] }}">
                    <input type="hidden" name="receiveRangeTwo" value="{{ $data['receiveRangeTwo'] }}">
                    <input type="hidden" name="receiveRangeThree" value="{{ $data['receiveRangeThree'] }}">
                    <input type="hidden" name="receiveRangeFour" value="{{ $data['receiveRangeFour'] }}">
                    <input type="hidden" name="receiveRangeFive" value="{{ $data['receiveRangeFive'] }}">

                    <input type="hidden" name="averageRangeOne" value="{{ $data['averageRangeOne'] }}">
                    <input type="hidden" name="averageRangeTwo" value="{{ $data['averageRangeTwo'] }}">
                    <input type="hidden" name="averageRangeThree" value="{{ $data['averageRangeThree'] }}">
                    <input type="hidden" name="averageRangeFour" value="{{ $data['averageRangeFour'] }}">
                    <input type="hidden" name="averageRangeFive" value="{{ $data['averageRangeFive'] }}">

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
                            <img alt="Logo" src="{{asset('metch')}}/media/logos/app_logo.png" class="page_speed_8658815 logo-img">
                        </a>
                        @else
                        <a href="#" class="logo">
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
                                    <div class="col-md-6">
                                        <p><b>Gender: </b></p>
                                        <p><b>Location: </b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $data['gender'] }}</p>
                                        <p>{{ $data['location'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 offset-md-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Date From:</b></p>
                                        <p><b>Date To:</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $data['dateFrom'] }}</p>
                                        <p>{{ $data['dateTo'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <table style="width: 100%">

                            <tr>
                                <th colspan="6">Time Range</th>
                            </tr>

                            <tr>
                                <th></th>
                                <th>9 – 11</th>
                                <th>11 – 13</th>
                                <th>13 – 15</th>
                                <th>15 – 17</th>
                                <th>17 – 19</th>
                            </tr>

                            <tr>
                                <td>Call Receive Success Percentage</td>
                                <td>{{ round($data['receiveRangeOne'],2) }}%</td>
                                <td>{{ round($data['receiveRangeTwo'],2) }}%</td>
                                <td>{{ round($data['receiveRangeThree'],2) }}%</td>
                                <td>{{ round($data['receiveRangeFour'],2) }}%</td>
                                <td>{{ round($data['receiveRangeFive'],2) }}%</td>
                            </tr>

                            <tr>
                                <td>Avg Call Duration Time (secs)</td>
                                <td>{{ round($data['averageRangeOne']) }}</td>
                                <td>{{ round($data['averageRangeTwo']) }}</td>
                                <td>{{ round($data['averageRangeThree']) }}</td>
                                <td>{{ round($data['averageRangeFour']) }}</td>
                                <td>{{ round($data['averageRangeFive']) }}</td>
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
