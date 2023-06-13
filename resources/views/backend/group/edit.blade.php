@extends('layouts.backend_app')

@section('title', 'Edit Group')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('groups.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewUser">
                            <i class="fas fa-users"></i>Group List</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-12">

                        <form id="formDiv" name="formDiv">

                            <input type="hidden" name="group_id" value="{{ $group->id }}" id="group_id"/>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Name:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $group->name }}" placeholder="Name">
                                        <p id="nameMsgupdate" style="color: red"></p>
                                    </div>
                                </div>
                            </diV>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Description:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea name="description" class="form-control" id="description" rows="8" cols="50" placeholder="Enter your description">{{ $group->description }}</textarea>
                                        <p id="descriptionMsgupdate" style="color: red"></p>
                                    </div>
                                </div>
                            </diV>




                            <div class="modal-footer">
                                <a href="{{ route('groups.index') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
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
            $('#updateBtn').click(function (e)
            {
                e.preventDefault();
                var group_id = $('#group_id').val();
                $('.preloader').show()

                $.ajax({
                    data: $('#formDiv').serialize(),
                    url: "/groups/"+group_id,
                    type: "PUT",
                    dataType: 'json',
                    success: function (data)
                    {
                        $('.preloader').hide()

                        $('#nameMsgupdate').html('');
                        $('#descriptionMsgupdate').html('');

                        if(data.errors)
                        {
                            if(data.errors.name)
                                $('#nameMsgupdate').html(data.errors.name[0]);
                            if(data.errors.description)
                                $('#descriptionMsgupdate').html(data.errors.description[0]);
                        }
                        else if(data.status == true)
                        {
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
