@extends('layouts.backend_app')

@section('title', 'Sms Campaign Report')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2 class="card-title">{{ $title }}</h2>
            </div>

           @include('backend.reports.ivr.usage_report.filterSection')

            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table" id="tableList">

                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Campaign</th>
                                    <th>Schedule</th>
                                    <th>Outbound Calls</th>
                                    <th>Call Receive</th>
                                    <th>Call Dropped</th>
                                    <th>SMS Send</th>
                                    <th style="width:90px;">Action</th>
                                </tr>
                            </thead>

                            @if(session()->get('ivrVoiceCampaigns'))
                                <tbody class="text-center">
                                @foreach(session()->get('ivrVoiceCampaigns') as $ivrVoiceCampaign)
                                    <tr>
                                        <td>{{ $ivrVoiceCampaign->campaign_title }}</td>
                                        <td>{{ $ivrVoiceCampaign->schedule }}</td>
                                        <td>{{ $ivrVoiceCampaign->total_calls }}</td>
                                        <td>{{ $ivrVoiceCampaign->total_receive_calls }}</td>
                                        <td>{{ $ivrVoiceCampaign->total_failed_calls }}</td>
                                        <td>{{ $ivrVoiceCampaign->total_sms_send }}</td>
                                        <td>
                                            <div data-toggle="tooltip" data-original-title="Show" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 smsCampaignView"><i class=" fi-rr-eye"></i></div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif

                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
