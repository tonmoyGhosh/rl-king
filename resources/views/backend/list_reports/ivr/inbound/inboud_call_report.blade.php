@extends('layouts.backend_app')

@section('title', 'Inbound IVR Voice Call Registered Report')

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
                <label for="gender" class="d-block">Gender</label>
                <select class="form-select form-select-solid" data-kt-select2="true"
                                        data-placeholder="Select Gender"
                                        data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                                        name="gender" id="gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                    <option value="Unspecified">Unspecified</option>
                </select>
            </div>


            <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container me-md-5">
                <label for="division" class="d-block">Division</label>
                <select class="form-select form-select-solid" data-kt-select2="true"
                                        data-placeholder="Select Division"
                                        data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                        name="division" id="division">
                    <option></option>
                    <option value="">Select Division</option>
                    @foreach ($division as $v)
                        @if($v->division == null)
                            <option value="Unspecified">Unspecified</option>
                        @else
                            <option value="{{ $v->division }}">{{ ucwords(str_replace('-',' ',$v->division)) }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container me-md-5">
                <label for="district" class="d-block">District</label>
                <select class="form-select form-select-solid" data-kt-select2="true"
                                        data-placeholder="Select District"
                                        data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                        name="district" id="district">
                    <option value="">Select District</option>
                    @foreach ($district as $v)
                        @if($v->district == null)
                            <option value="Unspecified">Unspecified</option>
                        @else
                            <option value="{{ $v->district }}">{{ ucwords(str_replace('-',' ',$v->district)) }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container me-md-5">
                <label for="area" class="d-block">Area</label>
                <select class="form-select form-select-solid" data-kt-select2="true"
                                        data-placeholder="Select Area"
                                        data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                        name="area" id="area">

                    <option value="">Select Area</option>
                    @foreach ($area as $v)
                        @if($v->area == null)
                            <option value="Unspecified">Unspecified</option>
                        @else
                            <option value="{{ $v->area }}">{{ ucwords(str_replace('-',' ',$v->area)) }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container me-md-5">
                <label for="area" class="d-block">Stakeholder</label>
                <select class="form-select form-select-solid" data-kt-select2="true"
                        data-placeholder="Select Stakeholder"
                        data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                        name="stakeholder" id="stakeholder">

                    <option value="">Select Stakeholder</option>
                    @foreach ($stakeholder as $v)
                        @if($v->stakeholder == null)
                            <option value="Unspecified">Unspecified</option>
                        @else
                            <option value="{{ $v->stakeholder }}">{{ ucwords(str_replace('-',' ',$v->stakeholder)) }}</option>
                        @endif
                    @endforeach
                </select>
            </div>


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
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Phone Number</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Gender</th>
                                    <th style="text-align: center;">Stakeholder</th>
                                    <th style="text-align: center;">Grade</th>
                                    <th style="text-align: center;">Occupation</th>
                                    <th style="text-align: center;">Division</th>
                                    <th style="text-align: center;">District</th>
                                    <th style="text-align: center;">Area</th>
                                    <th style="text-align: center;">Duration</th>
                                    <th style="text-align: center;">Status</th>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
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
            dom: 'lBfrtip',
            lengthMenu:[[50,500,1000,-1],[50,500,1000,'All']],
            // buttons: [
            //     'copy', 'excel', 'pdf'
            // ],
            buttons: [
                {
                    extend: 'excelHtml5',
                    autoFilter: false,
                    text:'Export to Excel',
                    // sheetName: 'Exported data',
                    exportOptions:
                        {
                        // columns: [ 0, 1, 2, 3 ,4, 5, 6, 7 ,8 ],
                            columns: ':visible',
                            modifer:
                                {
                                    page: 'all',
                                    search: 'none',
                                }
                        },
                },'colvis'
            ],

            ajax: {
                url: "{{ route('inbound-voice-call-report') }}",
                data: function(d) {
                    d.gender   = $('#gender').val(),
                    d.area     = $('#area').val(),
                    d.district = $('#district').val(),
                    d.division = $('#division').val(),
                    d.fromDate = $('#fromDate').val()
                    d.toDate   = $('#toDate').val()
                    d.stakeholder   = $('#stakeholder').val()


                },
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false
                },
                {
                    data: 'phone_number',
                    name: 'phone_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'stakeholder',
                    name: 'stakeholder'
                },
                {
                    data: 'grade',
                    name: 'grade'
                },
                {
                    data: 'occupation',
                    name: 'occupation'
                },
                {
                    data: 'division',
                    name: 'division'
                },
                {
                    data: 'district',
                    name: 'district'
                },
                {
                    data: 'area',
                    name: 'area'
                },
                {
                    data: 'duration',
                    name: 'duration'
                },
                {
                    data: 'status',
                    name: 'status'
                }
            ]
        });

        $('#filter').click(function()
        {
            if($("#fromDate").val() == '') swal_error('From date is required');
            else if($("#toDate").val() == '') swal_error('To date is required');
            else table.draw();
            // $(".preloader").show();

        });
    });

    $("#area").on('change', function () {
        $('#district').attr("disabled", true);
        $('#division').attr("disabled", true);
        if(($(this).val()) === ""){
            $('#district').attr("disabled", false);
            $('#division').attr("disabled", false);
        }
    });

    $("#district").on('change', function () {
        $('#area').attr("disabled", true);
        $('#division').attr("disabled", true);
        if(($(this).val()) === ""){
            $('#area').attr("disabled", false);
            $('#division').attr("disabled", false);
        }
    });

    $("#division").on('change', function () {
        $('#area').attr("disabled", true);
        $('#district').attr("disabled", true);
        if(($(this).val()) === ""){
            $('#area').attr("disabled", false);
            $('#district').attr("disabled", false);
        }
    });

</script>
@endpush
