@extends('layouts.backend_app')

@section('title', 'Create User')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewUser">
                    <i class="fas fa-users"></i>User List</a>
                </div>
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
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                    <p id="nameMsg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Email:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    <p id="emailMsg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Password:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                                    <p id="passwordMsg" style="color: red"></p>
                                    <br>
                                    <input type="checkbox" onclick="showPassword()"> Show Password
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Role:</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="role" id="role">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    <p id="roleMsg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Status:</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                    <p id="statusMsg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="modal-footer">
                            <a href="{{ route('users.index') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
                            <button type="button" class="btn btn-primary font-weight-bold" id="saveBtn">Save</button>
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

    $('#name, #email, #password').keyup(function (e)
    {
        if($(this).attr('id') == 'name') $('#nameMsg').html('');
        if($(this).attr('id') == 'email') $('#emailMsg').html('');
        if($(this).attr('id') == 'password') $('#passwordMsg').html('');
    });

    $('#role').change(function (e)
    {
        if($(this).attr('id') == 'role') $('#roleMsg').html('');
    });

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
                timer: 1000
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
                url: "{{ route('users.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data)
                {   
                    $('.preloader').hide();

                    $('#nameMsg').html('');
                    $('#emailMsg').html('');
                    $('#passwordMsg').html('');
                    $('#roleMsg').html('');

                    if(data.errors) 
                    {   
                        if (data.errors.name)
                            $('#nameMsg').html(data.errors.name[0]);
                        if (data.errors.email)
                            $('#emailMsg').html(data.errors.email[0]);
                        if (data.errors.password)
                            $('#passwordMsg').html(data.errors.password[0]);
                        if (data.errors.role)
                            $('#roleMsg').html(data.errors.role[0]);
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
