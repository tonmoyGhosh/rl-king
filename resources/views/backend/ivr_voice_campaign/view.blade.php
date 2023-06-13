@extends('layouts.backend_app')

@section('title', 'IVR Voice Campaign Details')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            
            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('ivr-voice-campaign.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewUser">
                    <i class="fas fa-users"></i>IVR Voice Campaign List</a>
                </div>
            </div>

            <div class="card-body">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Campaign Title:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $ivrVoiceCampaign->campaign_title }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Group:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $ivrVoiceCampaign->group->name }}
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-sm-2">
                            <label>Flow:</label>
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Start At:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $ivrVoiceCampaign->start_at }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Sender Id:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $ivrVoiceCampaign->sender_id }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Campaign Status:</label>
                        </div>
                        <div class="col-sm-6">
                            @if($ivrVoiceCampaign->campaign_status->status == 'Success')
                                <span class="badge badge-success">{{ $ivrVoiceCampaign->campaign_status->status }}</span>
                            @elseif($ivrVoiceCampaign->campaign_status->status == 'Pending')
                                <span class="badge badge-warning">{{ $ivrVoiceCampaign->campaign_status->status }}</span>
                            @elseif($ivrVoiceCampaign->campaign_status->status == 'Running')
                                <span class="badge badge-info">{{ $ivrVoiceCampaign->campaign_status->status }}</span>
                            @elseif($ivrVoiceCampaign->campaign_status->status == 'Failed')
                                <span class="badge badge-danger">{{ $ivrVoiceCampaign->campaign_status->status }}</span>
                            @else 
                                <span class="badge badge-secondary">{{ $ivrVoiceCampaign->campaign_status->status }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label>SMS Send:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $ivrVoiceCampaign->sms_send }}
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
