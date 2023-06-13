@extends('layouts.backend_app')

@section('title', 'Create IVR Voice Campaign')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />

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

                    <form id="formDiv" name="formDiv">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Campaign Title:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="campaign_title" class="form-control" id="campaign_title" placeholder="Campaign Title">
                                    <p id="campaign_title_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Group:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <select id="group_id" name="group" class="form-control">
                                        <option value=''>Select Group</option>
                                        @if($groupList)
                                            @foreach($groupList as $group)
                                                <option value='{{ $group->id }}'>{{ $group->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p id="group_id_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Flow:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <select id="flow" name="flow" class="form-control">
                                        <option value=''>Select Flow</option>
                                        @if($ivrFlows)
                                            @foreach($ivrFlows as $flow)
                                                <option value='{{ $flow->id }}'>{{ $flow->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p id="flow_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Campaign Start At:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="start_at" class="form-control" id="start_at" placeholder="Campaign Start At">
                                    <p id="start_at_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Sender Id:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="sender_id" value="{{ ($setting && $setting->sender_ids) ? $setting->sender_ids : '' }}" class="form-control" id="sender_id" placeholder="Sender Id" {{ ($setting && $setting->sender_ids) ? 'readonly' : '' }}>
                                    <p id="sender_id_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>SMS Send:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="sms_send">
                                </div>
                            </div>
                        </diV>

                        <div class="modal-footer">
                            <a href="{{ route('ivr-voice-campaign.index') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
                            <button type="button" class="btn btn-primary font-weight-bold" id="saveBtn">Proceed</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
    <script src="http://cdn.craig.is/js/rainbow-custom.min.js"></script>

    <script>

        $('document').ready(function ()
        {
            $('#start_at').datetimepicker({
                format:'d-m-Y H:i',
                formatTime:'H:i',
                formatDate:'Y-m-d',
                timepicker:true,
                datepicker:true,
            });

            // success alert
            function swal_success(msg) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                    timer: 1000
                })
            }

            // error alert
            function swal_error() {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Something goes wrong!',
                    showConfirmButton: true,
                })
            }

            // csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // initialize btn save
            $('#saveBtn').click(function (e)
            {
                e.preventDefault();
                $('.preloader').show()

                $.ajax({
                    data: $('#formDiv').serialize(),
                    url: "{{ route('ivr-voice-campaign.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data)
                    {
                        $('.preloader').hide()

                        $('#campaign_title_msg').html('');
                        $('#group_id_msg').html('');
                        $('#flow_msg').html('');
                        $('#start_at_msg').html('');
                        $('#sender_id_msg').html('');

                        if(data.errors)
                        {
                            if(data.errors.campaign_title)
                                $('#campaign_title_msg').html(data.errors.campaign_title[0]);
                            if(data.errors.group)
                                $('#group_id_msg').html(data.errors.group[0]);
                            if(data.errors.flow)
                                $('#flow_msg').html(data.errors.flow[0]);
                            if(data.errors.start_at)
                                $('#start_at_msg').html(data.errors.start_at[0]);
                            if(data.errors.sender_id)
                                $('#sender_id_msg').html(data.errors.sender_id[0]);
                        }
                        else if(data.status == true)
                        {
                            $('#formDiv').trigger("reset");
                            swal_success(data.message);
                            window.setTimeout( function(){
                                window.location = "{{ route('ivr-voice-campaign.index') }}"
                            }, 100 )
                        }
                        else {
                            swal_error();
                            $('.preloader').hide()

                        }

                    },
                    error: function (data)
                    {
                        swal_error();
                        $('.preloader').hide()

                    }
                });

            });

        });

    </script>
@endpush