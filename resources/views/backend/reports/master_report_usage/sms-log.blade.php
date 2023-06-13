@extends('layouts.backend_app')

@section('title', 'Master Report Usage SMS Log')

@section('content')

<style>
    .docSection {
        border: 2px outset black;
        background-color: #eff2f5;
        text-align: center;
    }
</style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{$title}}</h2>
            </div>

            <form action="{{ route('master_report_usage-sms_log_request') }}" method="POST">
                @csrf

                <div class="card-search" id="kt_menu_6253a6203b93d">
                    
                    <div class="d-flex align-items-center justify-content-start me-md-n5 justify-content-lg-start flex-wrap">
                        
                        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container me-md-5">
                            <label for="fromDate" class="d-block">From Date</label>
                            <input class="form-control" type="date" name="fromDate" id="fromDate" required>
                        </div>
                        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container me-md-5">
                            <label for="toDate" class="d-block">To Date</label>
                            <input class="form-control" type="date" name="toDate" id="toDate" required>
                        </div>

                        <div class="mb-3 mb-md-2 mb-lg-2 select_container text-end">
                            <label for="" class="d-block invisible">search-btn</label>
                            <button id="filter" class="btn btn-success select_container" type="submit">Search</button>
                        </div>
                    
                    </div>

                </div>

            </form>

            @if(session()->get('data'))
            @php $data = session()->get('data'); @endphp
            <div class="card-body">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <div class="docSection">

                            <br>
                                <h5>SMS Log Of {{ $data['dateFrom'] }} - {{ $data['dateTo'] }}</h5>
                                <p><b>Success SMS: </b>{{ $data['successSms'] }}</p>
                                <p><b>Fail SMS: </b>{{ $data['failSms'] }}</p>
                                <p><b>Content Download SMS: </b>{{ $data['ivrSms'] }}</p>
                                <p><b>Total SMS: </b>{{ $data['successSms'] + $data['failSms'] + $data['ivrSms'] }}</p>
                            <br>

                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection