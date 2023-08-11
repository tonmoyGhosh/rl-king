@extends('layouts.backend_app')

@section('title', 'Coin Send Transaction List')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{ $title }}</h2>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="tableList">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Sl</th>
                                    <th>Send User Name</th>
                                    <th>Send User Id</th>
                                    <th>Total Coin</th>
                                    <th>Status</th>
                                    <th>Approved By</th>
                                    <th>Rejected By</th>
                                    <th style="width:137px;">Action</th>
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
                title: 'Something goes wrong!',
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
            ajax: "{{ route('coin-agency-coin-send-request-list') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false
                },
                {
                    data: 'send_user_name',
                    name: 'send_user_name'
                },
                {
                    data: 'send_user_id',
                    name: 'send_user_id'
                },
                {
                    data: 'coin',
                    name: 'coin'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'approved_by',
                    name: 'approved_by'
                },
                {
                    data: 'rejected_by',
                    name: 'rejected_by'
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
        $('body').on('click', '.editModel', function ()
        {
            var model_id = $(this).data('id');
            window.location.href = "../coin-agency-coin-send-request/edit/"+model_id;
        });
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // initialize btn delete
        $('body').on('click', '.deleteModel', function () {

            var model_id = $(this).data("id");

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
                        type: "POST",
                        url: "../coin-agency-coin-send-request/delete/" + model_id,
                        success: function (data)
                        {
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