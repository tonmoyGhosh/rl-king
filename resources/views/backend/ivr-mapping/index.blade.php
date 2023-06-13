@extends('layouts.backend_app')

@section('title', 'IVR Mapping List')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('ivr-mapping.create') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder">
                            <i class="fas fa-plus"></i>Add IVR Mapping</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="tableList">
                                <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Title</th>
                                    <th>Created By</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script>
        $('document').ready(function () {

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
                    title: 'Something went wrong!',
                    showConfirmButton: true,
                })
            }

            // table serverside
            var table = $('#tableList').DataTable({
                processing: false,
                serverSide: true,
                ordering: false,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('ivr-mapping.index') }}",
                columns: [
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // initialize btn edit
            $('body').on('click', '.editGroup', function ()
            {
                var ivr_id = $(this).data('id');
                window.location.href = "/ivr-mapping/"+ivr_id+"/edit";
            });

            // initialize btn show
            $('body').on('click', '.showivrmapping', function ()
            {
                var ivr_id = $(this).data('id');
                window.location.href = "/ivr-mapping/"+ivr_id+"";
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // initialize btn delete
            $('body').on('click', '.deleteMapping', function () {

                var ivr_id = $(this).data("id");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "DELETE",
                            url: "/ivr-mapping" + '/' + ivr_id,
                            success: function (data)
                            {
                                console.log(data.status)
                                if(data.status == true)
                                {
                                    swal_success(data.message);
                                    table.draw();
                                }
                                else swal_error();

                            },
                            error: function (data)
                            {
                                swal_error();
                            }
                        });
                    }
                })

            });


        });

    </script>
@endpush
