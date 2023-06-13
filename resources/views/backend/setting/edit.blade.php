@extends('layouts.backend_app')

@section('title', 'Create Group')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('settings.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder">
                            <i class="fas fa-users"></i>Setting List</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-12">

                        <form id="formDiv" name="formDiv" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="setting_id" value="{{ $setting->id }}" id="setting_id"/>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>App Name:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="app_name" class="form-control" id="app_name" value="{{$setting->app_name}}" placeholder="Enter Your App Name">
                                        <p id="appNameMsg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Company Name:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="company_name" class="form-control" id="company_name" value="{{$setting->company_name}}" placeholder="Enter Your Company Name">
                                        <p id="companyNameMsg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Company Address:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="company_address" class="form-control" id="company_address" value="{{$setting->company_address}}" placeholder="Enter Your Company Address">
                                        <p id="companyAddressMsg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Sender Ids:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="sender_ids" class="form-control" id="sender_ids" value="{{$setting->sender_ids}}" placeholder="Enter Your Sender Ids">
                                        <p id="senderIdsMsg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Logo:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($setting->logo)
                                            <p class="help-block">
                                                <input type="file" name="logo" class="form-control" id="logo">
                                                <span id="logoMsg" style="color: red"></span>
                                                <a class='btn btn-info btn-xs' target='_blank' href='{{ url("{$setting->logo}") }}'>
                                                    <i class='fa fa-paper-plane'></i>
                                                </a>
                                            </p>
                                        @else
                                            <input type="file" name="logo" class="form-control" id="logo">
                                            <p id="logoMsg" style="color: red"></p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Mask Name:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="mask_name" class="form-control" id="mask_name" value="{{$setting->mask_name}}"  placeholder="Enter Your Mask Name">
                                        <p id="maskNameMsg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>IVR Massage Body:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea name="ivr_massage_body" class="form-control" id="ivr_massage_body"
                                                  placeholder="Enter your IVR Massage Body " rows="8" cols="50">{{$setting->ivr_massage_body}}</textarea>
                                        <p id="ivrMassageBodyMsg" style="color: red"></p>
                                    </div>

                                </div>
                            </div> -->



                            <div class="modal-footer">
                                <a href="{{ route('settings.index') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
                                <button type="submit" class="btn btn-primary font-weight-bold" id="saveBtn">Update</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>

        $('document').ready(function ()
        {
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
                    title: 'Something went wrong',
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
            $('#formDiv').submit(function (e)
            {
                e.preventDefault();
                var setting = $('#setting_id').val();

                $('.preloader').show()

                $.ajax({
                    type: "POST",
                    url: "{{ route('settings.update',$setting->id) }}",
                    enctype: 'multipart/form-data',
                    data: new FormData(this),
                    dataType: 'json',
                    processData: false,
                    contentType: false,


                    success: function (data)
                    {
                        $('.preloader').hide()

                        $('#appNameMsg').html('');
                        $('#companyAddressMsg').html('');
                        $('#companyNameMsg').html('');
                        $('#senderIdsMsg').html('');
                        $('#maskNameMsg').html('');
                        $('#ivrMassageBodyMsg').html('');

                        if(data.errors)
                        {
                            if(data.errors.app_name)
                                $('#appNameMsg').html(data.errors.name[0]);
                            if(data.errors.company_name)
                                $('#companyNameMsg').html(data.errors.company_name[0]);
                            if(data.errors.company_address)
                                $('#companyAddressMsg').html(data.errors.company_address[0]);
                            if(data.errors.sender_ids)
                                $('#senderIdsMsg').html(data.errors.sender_ids[0]);
                            if(data.errors.mask_name)
                                $('#maskNameMsg').html(data.errors.mask_name[0]);
                            if(data.errors.ivr_massage_body)
                                $('#ivrMassageBodyMsg').html(data.errors.ivr_massage_body[0]);
                        }


                        else if(data.status == true)
                        {
                            $('#formDiv').trigger("reset");
                            swal_success(data.message);
                            window.setTimeout( function(){
                                window.location = "{{ route('settings.index') }}"
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
