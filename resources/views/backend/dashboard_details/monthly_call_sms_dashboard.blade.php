@extends('layouts.backend_app')

@section('title', 'Dashboard')

@section('content')

<div class="container h-100" id="calls_sms">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                <div class="col-xxl-12 mb-5 mb-xl-10">
                        <!--begin::Chart widget 13-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Header-->
                            <form action="" onsubmit="return false;" id="formData">
                                <div class="card-search" id="kt_menu_6253a6203b93d">

                                    <!--begin:: Filter-->
                                    <!--begin:: Select-box-->
                                    <div class="d-flex align-items-center justify-content-start me-md-n5 justify-content-lg-start justify-content-xxl-between flex-wrap">
                                    <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
                                    <label for="gender" class="d-block">Gender</label>
                                        <select class="form-select form-select-solid"
                                                 data-kt-select2="true"
                                                data-placeholder="Select Gender"
                                                data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                                                name="gender" id="filter-gender">

                                            <option value="" default >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
                                    <label for="division" class="d-block">Division</label>
                                        <select class="form-select form-select-solid" data-kt-select2="true"
                                                                data-placeholder="Select Division"
                                                                data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                                                name="division" id="filter-division">
                                            <option value="" default>Select Division</option>
                                        </select>
                                    </div>
                                    <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
                                    <label for="district" class="d-block">District</label>
                                        <select class="form-select form-select-solid" data-kt-select2="true"
                                                                data-placeholder="Select District"
                                                                data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                                                name="district" id="filter-district">
                                            <option value="" default>Select District</option>
                                        </select>
                                    </div>
                                    <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
                                    <label for="area" class="d-block">Area</label>
                                        <select class="form-select form-select-solid" 
                                                data-kt-select2="true"
                                                data-placeholder="Select Area"
                                                data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                                                name="area" id="filter-area">
                                            <option value="" default>Select Area</option>
                                        </select>
                                    </div>
                                        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
                                            <label for="fromDate" class="d-block">Date</label>
                                            <input class="form-control" type="text" name="fromMonth" placeholder="Select Month" id="filter-SelectMonth" required autocomplete="off">
                                        </div>
                                    </div>
                                        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container d-flex justify-content-end">
                                            <div class="mr-4 select_container">
                                                <label for="" class="d-block invisible">Field Reset</label>
                                                <button id="filter-reset" class="btn btn-default select_container" type="button" >Field Reset</button>
                                            </div>
                                            <div class="  select_container">
                                                <label for="" class="d-block invisible">search-btn</label>
                                                <button id="filter-searchhiostory" class="btn btn-success select_container" type="submit" >Search</button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                            <!--end::Header-->
                        </div>
                        <!--end::Chart widget 13-->
                    </div>
                    <div class="col-xl-12 mb-5 mb-xl-10" >
                        <!--begin::Tables widget 10-->
                        <div class="card card-flush h-xl-100" id="ELEMENT2">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-gray-800">Statistics At a Glance</span>
                                    <span class="text-gray-600 pt-1 fw-bold fs-6">Current Month to Date</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <ul class="nav align-items-center">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active" href="{{route('dashboard')}}">Go Back</a>
                                        </li>
                                        <li class="nav-item">
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary h-auto" id="BTN2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                                                    <path d="M1.734 2.75984H4.65715L5.35355 0.808207C5.40166 0.674662 5.48983 0.559227 5.60601 0.477671C5.72219 0.396114 5.86071 0.352414 6.00266 0.352539H12.5969C12.8871 0.352539 13.1472 0.535236 13.2439 0.808207L13.9425 2.75984H16.8656C17.8156 2.75984 18.5851 3.52932 18.5851 4.47934V14.2805C18.5851 15.2305 17.8156 16 16.8656 16H1.734C0.783972 16 0.0144939 15.2305 0.0144939 14.2805V4.47934C0.0144939 3.52932 0.783972 2.75984 1.734 2.75984ZM1.56205 14.2805C1.56205 14.3751 1.63942 14.4525 1.734 14.4525H16.8656C16.9602 14.4525 17.0376 14.3751 17.0376 14.2805V4.47934C17.0376 4.38477 16.9602 4.30739 16.8656 4.30739H12.8527L12.4852 3.27999L11.993 1.90009H6.60878L6.11658 3.27999L5.74903 4.30739H1.734C1.63942 4.30739 1.56205 4.38477 1.56205 4.47934V14.2805ZM9.2998 5.683C11.1999 5.683 12.7388 7.22195 12.7388 9.122C12.7388 11.022 11.1999 12.561 9.2998 12.561C7.39975 12.561 5.8608 11.022 5.8608 9.122C5.8608 7.22195 7.39975 5.683 9.2998 5.683ZM9.2998 11.1854C10.439 11.1854 11.3632 10.2612 11.3632 9.122C11.3632 7.98283 10.439 7.0586 9.2998 7.0586C8.16063 7.0586 7.2364 7.98283 7.2364 9.122C7.2364 10.2612 8.16063 11.1854 9.2998 11.1854Z" fill="#828282"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3 "  style="min-height: 400px;">
                                <!--begin::Table container-->
                                <div class="table-responsive" >
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                        <tr class="fs-7 fw-bolder border-0 text-gray-600">
                                            <th class="min-w-200px text-start ps-3" colspan="2">Particulars</th>
                                            <th class="min-w-100px text-end pe-0" colspan="2">Count Corrent Month</th>
                                            <th class="min-w-100px text-end pe-0" colspan="2">Count Last Month</th>
                                            <th class="min-w-100px text-end pe-0" colspan="2">Percentage Rate Corrent Month</th>
                                            <th class="min-w-100px text-end pe-3 " colspan="2">Percentage Rate Last Month</th>
                                        </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody id="callTable" >
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Tables Widget 10-->
                    </div>
                </div>
            </div>


@endsection
@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $('document').ready(function() {
            // success alert
           $('#filter-SelectMonth').datepicker({
               changeMonth: true,
               changeYear: true,
               showButtonPanel: true,
               dateFormat: 'mm yy',
               onClose: function(dateText, inst) {
                   $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
               }
           });
        })
 </script>
 <script>
        $("#filter-searchhiostory").click(function(){
            $(".preloader").show();
        });

        $('input[required]').on('invalid', function(e){
            $(".preloader").hide();
        });

        $("#filter-area").on('change', function () {
            $('#filter-district').attr("disabled", true);
            $('#filter-division').attr("disabled", true);
            if(($(this).val()) === ""){
                $('#filter-district').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
            }
        });

        $("#filter-district").on('change', function () {
            $('#filter-area').attr("disabled", true);
            $('#filter-division').attr("disabled", true);
            if(($(this).val()) === ""){
                $('#filter-area').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
            }
        });

        $("#filter-division").on('change', function () {
            $('#filter-area').attr("disabled", true);
            $('#filter-district').attr("disabled", true);
            if(($(this).val()) === ""){
                $('#filter-area').attr("disabled", false);
                $('#filter-district').attr("disabled", false);
            }
        });
    </script>
@endpush