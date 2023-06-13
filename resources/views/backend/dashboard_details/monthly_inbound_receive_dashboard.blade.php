@extends('layouts.backend_app')

@section('title', 'Dashboard')

@section('content')

<div class="container h-100" id="inbound_received">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                <div class="col-xxl-12 mb-5 mb-xl-10">
                        <!--begin::Chart widget 13-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Header-->
                            <form onsubmit="return false;" id="formData">
                                <div class="card-search" id="kt_menu_6253a6203b93d">

                                    <!--begin:: Filter-->
                                    <!--begin:: Select-box-->
                                    <div class="d-flex align-items-center justify-content-startme-md-n5 justify-content-lg-start justify-content-xxl-between flex-wrap">
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
                                        <label for="fromDate" class="d-block">From Date</label>
                                        <input class="form-control" type="date" name="fromDate" id="filter-fromDate" required autocomplete="off">
                                    </div>
                                    <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
                                        <label for="toDate" class="d-block">To Date</label>
                                        <input class="form-control" type="date" name="toDate" id="filter-toDate" required autocomplete="off">
                                    </div>
                                    </div>
                                        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 mb-lg-2 select_container d-flex justify-content-end">
                                            <div class="mr-4 select_container">
                                                <label for="" class="d-block invisible">Field Reset</label>
                                                <button id="filter-reset" class="btn btn-default select_container" type="button">Field Reset</button>
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
                    {{--    kt_charts_widget_71_tab_21    --}}
                    <div class="col-xl-12 mb-5 mb-xl-10" >
                        <!--begin::Chart widget 32-->
                        <div class="card card-flush h-xl-100" id="ELEMENT10">
                            <!--begin::Header-->
                            <div class="card-header pt-7 mb-3">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-gray-800">Outbound Content Played
<br> by Category</span>
                                    <!-- <span class="text-gray-600 mt-1 fw-bold fs-6">Total 424,567 deliveries</span> -->
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <ul class="nav align-items-center">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active" href="{{route('dashboard')}}">Go Back</a>
                                        </li>
                                        <li>
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary h-auto" id="BTN10">
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
                            <div class="card-body d-flex flex-column justify-content-between pb-5 px-0" >
                                <!--begin::Nav-->
                                <ul class="nav nav-pills nav-pills-custom mb-3 mx-9 flex-nowrap overflow-auto">
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2 active" data-bs-toggle="pill" id="kt_charts_widget_71_tab_22" href="#kt_charts_widget_71_tab_content_22">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Media/Music.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,17.0400072 L8,8 C8,7.56261503 8.28424981,7.17598102 8.70172501,7.04552002 L17.701725,4.54552002 C18.3456556,4.34429171 19,4.82535976 19,5.5 L19,17 C19,17.0001911 18.9999999,17.0003822 18.9999998,17.0005733 C18.9996127,18.1048793 17.880473,19 16.5,19 C15.1192881,19 14,18.1045695 14,17 C14,15.8954305 15.1192881,15 16.5,15 C16.6712329,15 16.838445,15.0137721 17,15.0400072 L17,8 L10,9.875 L10,19 C10,19.0001911 9.99999995,19.0003822 9.99999984,19.0005733 C9.99961272,20.1048793 8.88047301,21 7.5,21 C6.11928813,21 5,20.1045695 5,19 C5,17.8954305 6.11928813,17 7.5,17 C7.67123292,17 7.83844503,17.0137721 8,17.0400072 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Rhymes</span>
                                            <!--end::Title-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_71_tab_23" href="#kt_charts_widget_71_tab_content_23">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Media/Music.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,17.0400072 L8,8 C8,7.56261503 8.28424981,7.17598102 8.70172501,7.04552002 L17.701725,4.54552002 C18.3456556,4.34429171 19,4.82535976 19,5.5 L19,17 C19,17.0001911 18.9999999,17.0003822 18.9999998,17.0005733 C18.9996127,18.1048793 17.880473,19 16.5,19 C15.1192881,19 14,18.1045695 14,17 C14,15.8954305 15.1192881,15 16.5,15 C16.6712329,15 16.838445,15.0137721 17,15.0400072 L17,8 L10,9.875 L10,19 C10,19.0001911 9.99999995,19.0003822 9.99999984,19.0005733 C9.99961272,20.1048793 8.88047301,21 7.5,21 C6.11928813,21 5,20.1045695 5,19 C5,17.8954305 6.11928813,17 7.5,17 C7.67123292,17 7.83844503,17.0137721 8,17.0400072 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Stroies</span>
                                            <!--end::Title-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_71_tab_24" href="#kt_charts_widget_71_tab_content_24">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Media/Music.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,17.0400072 L8,8 C8,7.56261503 8.28424981,7.17598102 8.70172501,7.04552002 L17.701725,4.54552002 C18.3456556,4.34429171 19,4.82535976 19,5.5 L19,17 C19,17.0001911 18.9999999,17.0003822 18.9999998,17.0005733 C18.9996127,18.1048793 17.880473,19 16.5,19 C15.1192881,19 14,18.1045695 14,17 C14,15.8954305 15.1192881,15 16.5,15 C16.6712329,15 16.838445,15.0137721 17,15.0400072 L17,8 L10,9.875 L10,19 C10,19.0001911 9.99999995,19.0003822 9.99999984,19.0005733 C9.99961272,20.1048793 8.88047301,21 7.5,21 C6.11928813,21 5,20.1045695 5,19 C5,17.8954305 6.11928813,17 7.5,17 C7.67123292,17 7.83844503,17.0137721 8,17.0400072 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Songs</span>
                                            <!--end::Title-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    

                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_71_tab_25" href="#kt_charts_widget_71_tab_content_25">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                            <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Media/Music.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,17.0400072 L8,8 C8,7.56261503 8.28424981,7.17598102 8.70172501,7.04552002 L17.701725,4.54552002 C18.3456556,4.34429171 19,4.82535976 19,5.5 L19,17 C19,17.0001911 18.9999999,17.0003822 18.9999998,17.0005733 C18.9996127,18.1048793 17.880473,19 16.5,19 C15.1192881,19 14,18.1045695 14,17 C14,15.8954305 15.1192881,15 16.5,15 C16.6712329,15 16.838445,15.0137721 17,15.0400072 L17,8 L10,9.875 L10,19 C10,19.0001911 9.99999995,19.0003822 9.99999984,19.0005733 C9.99961272,20.1048793 8.88047301,21 7.5,21 C6.11928813,21 5,20.1045695 5,19 C5,17.8954305 6.11928813,17 7.5,17 C7.67123292,17 7.83844503,17.0137721 8,17.0400072 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Riddles</span>
                                            <!--end::Title-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Nav-->
                                <!--begin::Tab Content-->
                                <div class="tab-content ps-4 pe-6">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_71_tab_content_25">
                                        <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="outbound_all_totla_dhada">0</span> <br>                                        
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_71_chart_25" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_71_tab_content_23">
                                        <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="outbound_all_totla_gaan">0</span> <br>                                        
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_71_chart_23" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_71_tab_content_24">
                                        <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="outbound_all_totla_golpo">0</span> <br>                                        
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_71_chart_24" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade active show" id="kt_charts_widget_71_tab_content_22">
                                        <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="outbound_all_totla_kobita">0</span> <br>                                        
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_71_chart_22" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Chart widget 70-->
                    </div>
                </div>
            </div>


@endsection
@push('scripts')
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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