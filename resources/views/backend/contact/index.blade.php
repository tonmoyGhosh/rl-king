@extends('layouts.backend_app')

@section('title', 'Contact List')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder">
                        <i class="fas fa-plus"></i>Add Contact</a>
{{--                    <a class="btn btn-success" href="{{ route('contacts.export') }}">Export</a>--}}
                </div>

            </div>


            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="tableList">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Group Name</th>
                                    <th>Stakeholder</th>
                                    <th>Occupation</th>
                                    <th>School</th>
                                    <th>Grade </th>
                                    <th>Gender</th>
                                    <th>Area</th>
                                    <th>District </th>
                                    <th>Division</th>
                                    <th>Phone No</th>
                                    <th style="width:90px;">Action</th>
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
    $('document').ready(function() {

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
            "columnDefs": [
                { "searchable": false, "targets": [0] }
            ],
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'excel', 'pdf'
            ],
            ajax: "{{ route('contacts.index') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'group.name',
                    name: 'group.name'
                },
                {
                    data: 'stakeholder',
                    name: 'stakeholder'
                },
                {
                    data: 'occupation',
                    name: 'occupation'
                },
                {
                    data: 'school',
                    name: 'school'
                },
                {
                    data: 'grade',
                    name: 'grade'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'area',
                    name: 'area'
                },
                {
                    data: 'district',
                    name: 'district'
                },
                {
                    data: 'division',
                    name: 'division'
                },
                {
                    data: 'phone_number',
                    name: 'phone_number'
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
        $('body').on('click', '.editContact', function() {
            var contact_id = $(this).data('id');
            window.location.href = "/contacts/" + contact_id + "/edit";
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // initialize btn delete
        $('body').on('click', '.deleteContact', function() {

            var contact_id = $(this).data("id");

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
                        url: "/contacts" + '/' + contact_id,
                        success: function(data) {
                            if (data.status == true) {
                                swal_success(data.message);
                                table.draw();
                            } else swal_error();

                        },
                        error: function(data) {
                            swal_error();
                        }
                    });
                }
            })

        });


    });
</script>
@endpush
