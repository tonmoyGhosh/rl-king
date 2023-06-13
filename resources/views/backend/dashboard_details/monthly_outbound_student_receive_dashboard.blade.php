@extends('layouts.backend_app')

@section('title', 'Dashboard')

@section('content')

<div class="container h-100" id="outbound_student_receive">
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
                                                <button id="filter-searchhiostory" class="btn btn-success select_container" type="submit">Search</button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                            <!--end::Header-->
                        </div>
                        <!--end::Chart widget 13-->
                    </div>
                {{--    kt_charts_widget_72_tab_31    --}}
                    <div class="col-xl-12 mb-5 mb-xl-10" >
                        <!--begin::Chart widget 32-->
                        <div class="card card-flush h-xl-100" id="ELEMENT9">
                            <!--begin::Header-->
                            <div class="card-header pt-7 mb-3">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-gray-800">Outbound Content Played
                                    <br>by Student Grade/Parents </span>
                                    {{--                                <span class="text-gray-600 mt-1 fw-bold fs-6">Total 424,567 deliveries</span>--}}
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <ul class="nav align-items-center">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active" href="{{route('dashboard')}}">Go Back</a>
                                        </li>
                                        <li>
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary h-auto" id="BTN9">
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
                                <ul class="nav nav-pills nav-pills-custom mb-3 mx-9 flex-nowrap overflow-auto" >
                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2 active" data-bs-toggle="pill" id="kt_charts_widget_72_tab_31" href="#kt_charts_widget_72_tab_content_31">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                                                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">All</span>
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
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_72_tab_32" href="#kt_charts_widget_72_tab_content_32">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                            <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Clothes/Shirt.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Class 1</span>
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
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_72_tab_33" href="#kt_charts_widget_72_tab_content_33">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                            <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Clothes/Shirt.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Class 2</span>
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
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_72_tab_34" href="#kt_charts_widget_72_tab_content_34">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Clothes/Shirt.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Class 3</span>
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
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_72_tab_35" href="#kt_charts_widget_72_tab_content_35">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Clothes/Shirt.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Class 4</span>
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
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_72_tab_36" href="#kt_charts_widget_72_tab_content_36">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Clothes/Shirt.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Class 5</span>
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
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_72_tab_37" href="#kt_charts_widget_72_tab_content_37">
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                <span class="svg-icon svg-icon-gray svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Clothes/Shirt.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <span class="nav-text text-gray-800 fw-bolder fs-7 lh-1">Unspecified</span>
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
                                <div class="tab-content ps-4 pe-6" >
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade active show" id="kt_charts_widget_72_tab_content_31">
                                    <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="all_class">0</span> <br>                                       
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>    
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_72_chart_31" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_72_tab_content_32">
                                    <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="all_class_1">0</span><br>                                         
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>    
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_72_chart_32" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_72_tab_content_33">
                                    <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="all_class_2">0</span> <br>                                        
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>    
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_72_chart_33" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_72_tab_content_34">
                                    <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="all_class_3">0</span> <br>                                        
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>    
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_72_chart_34" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_72_tab_content_35">
                                    <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="all_class_4">0</span> <br>                                        
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>    
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_72_chart_35" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_72_tab_content_36">
                                    <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="all_class_5">0</span><br>                                         
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>    
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_72_chart_36" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_72_tab_content_37">
                                    <div class="ps-4 pt-3">
                                        <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2" id="all_unspecified">0</span><br>                                         
                                        <span class="fs-5 fw-bold text-gray-600">Total Calls</span><br>
                                    </div>    
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_72_chart_37" class="min-h-auto" style="height: 375px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Chart widget 32-->
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