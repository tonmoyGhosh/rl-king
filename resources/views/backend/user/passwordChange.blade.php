@extends('layouts.backend_app')

@section('title', 'Password Change')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" >
                            <i class="fas fa-users"></i>User List</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-12">

                        <form id="formDiv" name="formDiv">
                            <div class="form-group">
                                
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label>New Password:</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                                        <p id="passwordMsg" style="color: red"></p>
                                        <br>
                                        <input type="checkbox" onclick="showPassword()"> Show Password
                                    </div>
                                </div>

                                <input type="hidden" name="userId" value="{{ $user->id }}" id="userId">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary font-weight-bold" id="updateBtn">Update</button>
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

        function showPassword()
        {
            var x = document.getElementById("password");
            if (x.type === "password")
            {
                x.type = "text";
            }
            else
            {
                x.type = "password";
            }
        }

        $('document').ready(function ()
        {   
            // success alert
            function swal_success(msg) 
            {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                    timer: 5000
                })
            }

            // error alert
            function swal_error() 
            {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Something went wrong!',
                    showConfirmButton: true,
                });
            }

            // csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // initialize btn save
            $('#updateBtn').click(function (e)
            {
                e.preventDefault();
                $('.preloader').show();
                
                $.ajax({
                    data: $('#formDiv').serialize(),
                    url: "{{ route('changePasswordRequest') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data)
                    {
                        $('.preloader').hide();
                        $('#passwordMsg').html('');

                        if(data.errors) 
                        {   
                            if (data.errors.password)
                                $('#passwordMsg').html(data.errors.password[0]);
                        } 
                        else if(data.status == true) 
                        {
                            $('#formDiv').trigger("reset");
                            swal_success(data.message);

                            window.setTimeout( function()
                            {
                                window.location = "{{ route('users.index') }}"
                                
                            }, 100 )
                        } 
                        else
                        {
                            swal_error(data.message);
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
