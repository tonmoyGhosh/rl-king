@extends('layouts.backend_app')

@section('title', 'Create Group')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('groups.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder">
                            <i class="fas fa-users"></i>Group List</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-12">

                        <form id="formDiv" name="formDiv">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Name:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name">
                                        <p id="nameMsg" style="color: red"></p>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Description:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea name="description" class="form-control" id="description"
                                                  placeholder="Enter your Description " rows="8" cols="50"></textarea>
                                        <p id="descriptionMsg" style="color: red"></p>
                                    </div>

                                </div>
                            </div>




                            <div class="modal-footer">
                                <a href="{{ route('groups.index') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
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
            $('#saveBtn').click(function (e)
            {
                e.preventDefault();

                $.ajax({
                    data: $('#formDiv').serialize(),
                    url: "{{ route('groups.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data)
                    {

                        $('#nameMsg').html('');
                        $('#descriptionMsg').html('');

                        if(data.errors)
                        {
                            if(data.errors.name)
                                $('#nameMsg').html(data.errors.name[0]);
                            if(data.errors.description)
                                $('#descriptionMsg').html(data.errors.description[0]);
                        }

                        else if(data.status == true)
                        {
                            $('#formDiv').trigger("reset");
                            swal_success(data.message);
                            window.setTimeout( function(){
                                window.location = "{{ route('groups.index') }}"
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
