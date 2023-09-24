@extends('layouts.backend_app')

@section('title', 'Edit Recharge Request')

@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{ $title }}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('coin-agency-recharge-list') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewUser">
                    <i class="fas fa-users"></i>Recharge List</a>
                </div>
            </div>

            <div class="card-body">
                <div class="col-md-12">

                    <form id="formDiv" name="formDiv">

                        <input value="{{ $model->id }}" name="model_id" type="hidden" />

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Currency:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <select id="currency_id" name="currency_id" class="form-control">
                                        <option value=''>Select Currency</option>
                                        @if($currencies)
                                            @foreach($currencies as $currency)
                                                <option value='{{ $currency->id }}' {{ ($currency->id == $model->currency_id) ? 'selected' : '' }}>{{ $currency->short_code }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p id="currency_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Recharge Amount:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input value="{{ $model->amount }}" type="text" name="amount" class="form-control" id="amount" placeholder="Recharge Amount">
                                    <p id="amount_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Payment Type:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input value="{{ $model->payment_type }}" type="text" name="payment_type" class="form-control" id="payment_type" placeholder="Payment Type">
                                    <p id="payment_type_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Transaction Id:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input value="{{ $model->transaction_id }}" type="text" name="transaction_id" class="form-control" id="transaction_id" placeholder="Transaction Id">
                                    <p id="transaction_id_msg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="modal-footer">
                            <a href="{{ route('coin-agency-recharge-list') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
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
                    url: "{{ route('coin-agency-recharge-update') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data)
                    {   

                        $('.preloader').hide()

                        $('#currency_msg').html('');
                        $('#amount_msg').html('');
                        $('#payment_type_msg').html('');

                        if(data.errors)
                        {
                            if(data.errors.currency_id)
                                $('#currency_msg').html(data.errors.currency_id[0]);
                            if(data.errors.amount)
                                $('#amount_msg').html(data.errors.amount[0]);
                            if(data.errors.payment_type)
                                $('#payment_type_msg').html(data.errors.payment_type[0]);
                        }
                        else if(data.status == false)
                        {
                            swal_error_2(data.message);
                        }
                        else if(data.status == true)
                        {
                            swal_success(data.message);
                            window.setTimeout( function(){
                                window.location = "{{ route('coin-agency-recharge-list') }}"
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
