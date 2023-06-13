@extends('layouts.backend_app')

@section('title', 'Sms Campaign List')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('sms-campaign.create') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder">
                    <i class="fas fa-plus"></i>Add Sms Campaign</a>
                </div>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="tableList">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>Sl</th>
                                    <th>Group</th>
                                    <th>Campaign Title</th>
                                    <th>Mask Title</th>
                                    <th>Start At</th>
                                    <th>Status</th>
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
            ajax: "{{ route('sms-campaign.index') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false
                },
                {
                    data: 'group.name',
                    name: 'group.name'
                },
                {
                    data: 'campaign_title',
                    name: 'campaign_title'
                },
                {
                    data: 'mask_title',
                    name: 'mask_title'
                },
                {
                    data: 'start_at',
                    name: 'start_at'
                },
                {
                    data: 'status',
                    name: 'status'
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
        $('body').on('click', '.smsCampaignView', function ()
        {
            var campaign_id = $(this).data('id');
            window.location.href = "sms-campaign/"+campaign_id+"";
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // initialize btn delete
        $('body').on('click', '.deleteUser', function () {

            var campaign_id = $(this).data("id");

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
                        url: "sms-campaign" + '/' + campaign_id,
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
