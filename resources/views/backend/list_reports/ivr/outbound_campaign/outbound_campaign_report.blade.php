@extends('layouts.backend_app')

@section('title', 'Outbound IVR Campaign Report')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                </div>

                <div class="card-search" id="kt_menu_6253a6203b93d">

                    <!--begin:: Filter-->
                    <!--begin:: Select-box-->
                    <div class="d-flex align-items-center justify-content-start me-md-n5 justify-content-lg-start flex-wrap">

                        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container me-md-5">
                            <label for="fromDate" class="d-block">From Date</label>
                            <input class="form-control" type="date" name="fromDate" id="fromDate">
                        </div>
                        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container me-md-5">
                            <label for="toDate" class="d-block">To Date</label>
                            <input class="form-control" type="date" name="toDate" id="toDate">
                        </div>

                    </div>

                    <div class="mb-3 mb-md-2 mb-lg-2 select_container text-end">
                        <label for="" class="d-block invisible">search-btn</label>
                        <button id="filter" class="btn btn-success select_container" type="submit">Search</button>
                    </div>

                </div>

                <div class="card-body">

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="tableList">
                                <thead class="font-weight-bold text-center">
                                <tr>
                                    <th style="text-align: center;">Sl</th>
                                    <th style="text-align: center;">Campaign Title</th>
                                    <th style="text-align: center;">Schedule Time</th>
                                    <th style="text-align: center;">Outbound Call</th>
                                    <th style="text-align: center;">Call Received</th>
                                    <th style="text-align: center;">Call Dropped</th>
                                    <th style="text-align: center;">Content Link Send</th>
                                    <th style="width:90px; text-align: center;">Action</th>
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $('document').ready(function ()
        {
            // error alert
            function swal_error(msg) {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: msg,
                    showConfirmButton: true,
                })
            }

            // table serverside
            var table = $('#tableList').DataTable({
                processing: true,
                searching: false,
                serverSide: true,
                ordering: false,
                dom: 'Bfrtip',

                ajax: {
                    url: "{{ route('outbound-ivr-campaign-report') }}",
                    data: function(d) {
                        d.fromDate = $('#fromDate').val()
                        d.toDate   = $('#toDate').val()

                    },
                },
                    columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false
                    },
                    {

                        data: 'campaign_title',
                        name: 'campaign_title'
                    },
                    {
                        data: 'schedule_time',
                        name: 'schedule_time'
                    },
                    {
                        data: 'outbound_call',
                        name: 'outbound_call'
                    },
                    {
                        data: 'call_received',
                        name: 'call_received'
                    },
                    {
                        data: 'call_withdrawn',
                        name: 'call_withdrawn'
                    },
                    {
                        data: 'content_link_send',
                        name: 'content_link_send'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#filter').click(function()
            {
                if($("#fromDate").val() == '') swal_error('From date is required');
                else if($("#toDate").val() == '') swal_error('To date is required');
                else table.draw();
                // $(".preloader").show();

            });

            // initialize btn edit
            $('body').on('click', '.ivrSmsDetailView', function ()
            {
                var campaign_id = $(this).data('id');
                window.location.href = "/list-reports/outbound-ivr-campaign-report-details/"+campaign_id+"";
            });
        });
    </script>
@endpush
