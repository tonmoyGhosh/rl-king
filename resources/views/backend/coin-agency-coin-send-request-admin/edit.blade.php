@extends('layouts.backend_app')

@section('title', 'Edit Coin Send Request')

@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{ $title }}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('coin-agency-coin-send-request-list') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewUser">
                    <i class="fas fa-users"></i>Coin Send Request List</a>
                </div>
            </div>

            <div class="card-body">
                <div class="col-md-12">

                    <form id="formDiv" name="formDiv">

                        <input type="hidden" name="model_id" value="{{ $model->id }}" />

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Total Coin:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="{{ ($walletInfo->total_coin) ? $walletInfo->total_coin : 0 }}" class="form-control" disabled>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>User Name:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="{{ $model->send_user_name }}" name="user_name" class="form-control" id="user_name" placeholder="User Name">
                                    <p id="user_name_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>User Id:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="{{ $model->send_user_id }}" name="user_id" class="form-control" id="user_id" placeholder="User Id">
                                    <p id="user_id_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Coin:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="coin" value="{{ $model->coin }}" class="form-control" id="coin" placeholder="Coin">
                                    <p id="coin_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Status:</label>
                                </div>
                                <div class="col-sm-6">
                                    <select id="status" name="status" class="form-control">
                                        <option value='Pending'>Pending</option>
                                        <option value='Approved'>Approved</option>
                                        <option value='Rejected'>Rejected</option>
                                    </select>
                                    <p id="status_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="modal-footer">
                            <a href="{{ route('coin-agency-coin-send-request-list') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
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

    </script>
@endpush
