@extends('layouts.backend_app')

@section('title', 'Coin Agency Profile')

@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{ $title }}</h2>
            </div>

            <div class="card-body">
                <div class="col-md-12">

                    <form id="formDiv" name="formDiv">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Name:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="{{ $user->name }}" name="user_name" class="form-control" id="user_name" placeholder="User Name" disabled>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Code:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="{{ $user->code }}" name="user_code" class="form-control" id="user_code" placeholder="User Code" disabled>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Email:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="{{ $user->email }}" name="user_code" class="form-control" id="email" placeholder="Email" disabled>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Phone No:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="{{ $user->phone_no }}" name="phone_no" class="form-control" id="phone_no" placeholder="Phone No" disabled>
                                </div>
                            </div>
                        </diV>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@push('scripts')

    <!-- <script>

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
                    url: "{{ route('coin-agency-coin-send-request-update') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data)
                    {
                        $('.preloader').hide()

                        $('#user_name_msg').html('');
                        $('#user_id_msg').html('');
                        $('#coin_msg').html('');

                        if(data.errors)
                        {
                            if(data.errors.user_name)
                                $('#user_name_msg').html(data.errors.user_name[0]);
                            if(data.errors.user_id)
                                $('#user_id_msg').html(data.errors.user_id[0]);
                            if(data.errors.coin)
                                $('#coin_msg').html(data.errors.coin[0]);
                        }
                        else if(data.status == true)
                        {
                            $('#formDiv').trigger("reset");
                            swal_success(data.message);
                            window.setTimeout( function(){
                                window.location = "{{ route('coin-agency-coin-send-request-list') }}"
                            }, 100 )
                        }

                        else if(data.status == false)
                        {
                            $('#coin_msg').html(data.message);
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

    </script> -->

@endpush
