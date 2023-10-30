@extends('layouts.backend_app')

@section('title', 'Add Live Hoster')

@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{ $title }}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('host-agency-live-hoster-list') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewUser">
                    <i class="fas fa-users"></i>Live Hoster List</a>
                </div>
            </div>

            <div class="card-body">
                <div class="col-md-12">

                    <form id="formDiv" name="formDiv">

                        <input type='hidden' name='model_id' value='{{ $model->id }}' />

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Hoster Name:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value='{{ $model->hoster_name }}' name="hoster_name" class="form-control" id="hoster_name" placeholder="Hoster Name">
                                    <p id="hoster_name_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Hoster Id:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="hoster_id" value='{{ $model->hoster_id }}' class="form-control" id="hoster_id" placeholder="Hoster Id">
                                    <p id="hoster_id_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="modal-footer">
                            <a href="{{ route('host-agency-live-hoster-list') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
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
                    title: 'Something goes wrong!',
                    showConfirmButton: true,
                })
            }

            function swal_error_2(msg) {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: msg,
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
                    url: "{{ route('host-agency-live-hoster-update') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data)
                    {
                        $('.preloader').hide()

                        $('#hoster_name_msg').html('');
                        $('#hoster_id_msg').html('');

                        if(data.errors)
                        {   
                            if(data.errors.hoster_name)
                                $('#hoster_name_msg').html(data.errors.hoster_name[0]);
                            if(data.errors.hoster_id)
                                $('#hoster_id_msg').html(data.errors.hoster_id[0]);
                        }
                        else if(data.status == false)
                        {
                            swal_error_2(data.message);
                        }
                        else if(data.status == true)
                        {
                            $('#formDiv').trigger("reset");
                            swal_success(data.message);
                            window.setTimeout( function(){
                                window.location = "{{ route('host-agency-live-hoster-list') }}"
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
