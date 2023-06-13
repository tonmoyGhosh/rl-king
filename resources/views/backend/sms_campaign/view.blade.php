@extends('layouts.backend_app')

@section('title', 'Sms Campaign Details')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            
            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('sms-campaign.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewUser">
                    <i class="fas fa-users"></i>Sms Campaign List</a>
                </div>
            </div>

            <div class="card-body">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Campaign Title:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $smsCampaign->campaign_title }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Mask Title:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $smsCampaign->mask_title }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Start At:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $smsCampaign->start_at }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Group:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ $smsCampaign->group->name }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label>Campaign Status:</label>
                        </div>
                        <div class="col-sm-6">
                            @if($smsCampaign->campaign_status->status == 'Success')
                                <span class="badge badge-success">{{ $smsCampaign->campaign_status->status }}</span>
                            @elseif($smsCampaign->campaign_status->status == 'Pending')
                                <span class="badge badge-warning">{{ $smsCampaign->campaign_status->status }}</span>
                            @elseif($smsCampaign->campaign_status->status == 'Running')
                                <span class="badge badge-info">{{ $smsCampaign->campaign_status->status }}</span>
                            @elseif($smsCampaign->campaign_status->status == 'Failed')
                                <span class="badge badge-danger">{{ $smsCampaign->campaign_status->status }}</span>
                            @else 
                                <span class="badge badge-secondary">{{ $smsCampaign->campaign_status->status }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Message:</label>
                            <textarea type="text" name="message" class="form-control" id="message" placeholder="Message" rows="8" disabled>{{ $smsCampaign->message }}</textarea>
                        </div>
                        
                    </div>


                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
