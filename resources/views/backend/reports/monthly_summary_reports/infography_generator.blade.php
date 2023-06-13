@extends('layouts.backend_app')

@section('title', 'Create Generate Body')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container" id="infography_content">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formDiv" name="formDiv">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <label>Date:<span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="toDate" id="toDate" required readonly />
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success font-weight-bold" id="saveBtn">Procceed</button>
                                </div>

                            </form>

                        </div>
                        <div class="col-md-12 infoGraph" style="display: none">
                            <!--begin::Charts Widget 1-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-2 mb-1">Breakdown of IVRS Outbound Call (Received)</span>
                                            <!-- <span class="text-muted fw-bold fs-7">More than 400 new members</span> -->
                                        </h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar" data-select2-id="select2-data-124-alpu">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary h-auto" id="BTN13">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                                                    <path d="M1.734 2.75984H4.65715L5.35355 0.808207C5.40166 0.674662 5.48983 0.559227 5.60601 0.477671C5.72219 0.396114 5.86071 0.352414 6.00266 0.352539H12.5969C12.8871 0.352539 13.1472 0.535236 13.2439 0.808207L13.9425 2.75984H16.8656C17.8156 2.75984 18.5851 3.52932 18.5851 4.47934V14.2805C18.5851 15.2305 17.8156 16 16.8656 16H1.734C0.783972 16 0.0144939 15.2305 0.0144939 14.2805V4.47934C0.0144939 3.52932 0.783972 2.75984 1.734 2.75984ZM1.56205 14.2805C1.56205 14.3751 1.63942 14.4525 1.734 14.4525H16.8656C16.9602 14.4525 17.0376 14.3751 17.0376 14.2805V4.47934C17.0376 4.38477 16.9602 4.30739 16.8656 4.30739H12.8527L12.4852 3.27999L11.993 1.90009H6.60878L6.11658 3.27999L5.74903 4.30739H1.734C1.63942 4.30739 1.56205 4.38477 1.56205 4.47934V14.2805ZM9.2998 5.683C11.1999 5.683 12.7388 7.22195 12.7388 9.122C12.7388 11.022 11.1999 12.561 9.2998 12.561C7.39975 12.561 5.8608 11.022 5.8608 9.122C5.8608 7.22195 7.39975 5.683 9.2998 5.683ZM9.2998 11.1854C10.439 11.1854 11.3632 10.2612 11.3632 9.122C11.3632 7.98283 10.439 7.0586 9.2998 7.0586C8.16063 7.0586 7.2364 7.98283 7.2364 9.122C7.2364 10.2612 8.16063 11.1854 9.2998 11.1854Z" fill="#828282"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body"  id="ELEMENT13">
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_9_chart" style="height: 350px; min-height: 365px;"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--begin::Labels-->
                                    <div class="mx-auto">
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px me-2" style="background: #60def5; "></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-bold text-muted" id ="current_month_1">Current Month</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                         <!--begin::Label-->
                                         <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px me-2" style="background: #fff707; "></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-bold text-muted" id="previous_month_1">Previous Month</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                <!--end::Body-->
                            </div>
                            <!--end::Charts Widget 1-->
                        </div>
                        <div class="col-md-12 infoGraph" style="display: none">
                            <!--begin::Charts Widget 1-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-2 mb-1">Breakdown of IVRS Outbound Calls Duration(Minutes)</span>
                                            <!-- <span class="text-muted fw-bold fs-7">More than 400 new members</span> -->
                                        </h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar" data-select2-id="select2-data-124-alpu">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary h-auto" id="BTN16">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                                                    <path d="M1.734 2.75984H4.65715L5.35355 0.808207C5.40166 0.674662 5.48983 0.559227 5.60601 0.477671C5.72219 0.396114 5.86071 0.352414 6.00266 0.352539H12.5969C12.8871 0.352539 13.1472 0.535236 13.2439 0.808207L13.9425 2.75984H16.8656C17.8156 2.75984 18.5851 3.52932 18.5851 4.47934V14.2805C18.5851 15.2305 17.8156 16 16.8656 16H1.734C0.783972 16 0.0144939 15.2305 0.0144939 14.2805V4.47934C0.0144939 3.52932 0.783972 2.75984 1.734 2.75984ZM1.56205 14.2805C1.56205 14.3751 1.63942 14.4525 1.734 14.4525H16.8656C16.9602 14.4525 17.0376 14.3751 17.0376 14.2805V4.47934C17.0376 4.38477 16.9602 4.30739 16.8656 4.30739H12.8527L12.4852 3.27999L11.993 1.90009H6.60878L6.11658 3.27999L5.74903 4.30739H1.734C1.63942 4.30739 1.56205 4.38477 1.56205 4.47934V14.2805ZM9.2998 5.683C11.1999 5.683 12.7388 7.22195 12.7388 9.122C12.7388 11.022 11.1999 12.561 9.2998 12.561C7.39975 12.561 5.8608 11.022 5.8608 9.122C5.8608 7.22195 7.39975 5.683 9.2998 5.683ZM9.2998 11.1854C10.439 11.1854 11.3632 10.2612 11.3632 9.122C11.3632 7.98283 10.439 7.0586 9.2998 7.0586C8.16063 7.0586 7.2364 7.98283 7.2364 9.122C7.2364 10.2612 8.16063 11.1854 9.2998 11.1854Z" fill="#828282"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body"  id="ELEMENT16">
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_9.1_chart" style="height: 350px; min-height: 365px;"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--begin::Labels-->
                                    <div class="mx-auto">
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px me-2" style="background: #60def5; "></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-bold text-muted" id ="current_month_2">Current Month</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                         <!--begin::Label-->
                                         <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px me-2" style="background: #fff707; "></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-bold text-muted" id="previous_month_2">Previous Month</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                <!--end::Body-->
                            </div>
                            <!--end::Charts Widget 1-->
                        </div>
                        <div class="col-md-12 infoGraph" style="display: none">
                            <!--begin::Charts Widget 1-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-2 mb-1">Breakdown of IVRS Inbound Calls Duration(Minutes)</span>
                                            <!-- <span class="text-muted fw-bold fs-7">More than 400 new members</span> -->
                                        </h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar" data-select2-id="select2-data-124-alpu">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary h-auto" id="BTN15">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                                                    <path d="M1.734 2.75984H4.65715L5.35355 0.808207C5.40166 0.674662 5.48983 0.559227 5.60601 0.477671C5.72219 0.396114 5.86071 0.352414 6.00266 0.352539H12.5969C12.8871 0.352539 13.1472 0.535236 13.2439 0.808207L13.9425 2.75984H16.8656C17.8156 2.75984 18.5851 3.52932 18.5851 4.47934V14.2805C18.5851 15.2305 17.8156 16 16.8656 16H1.734C0.783972 16 0.0144939 15.2305 0.0144939 14.2805V4.47934C0.0144939 3.52932 0.783972 2.75984 1.734 2.75984ZM1.56205 14.2805C1.56205 14.3751 1.63942 14.4525 1.734 14.4525H16.8656C16.9602 14.4525 17.0376 14.3751 17.0376 14.2805V4.47934C17.0376 4.38477 16.9602 4.30739 16.8656 4.30739H12.8527L12.4852 3.27999L11.993 1.90009H6.60878L6.11658 3.27999L5.74903 4.30739H1.734C1.63942 4.30739 1.56205 4.38477 1.56205 4.47934V14.2805ZM9.2998 5.683C11.1999 5.683 12.7388 7.22195 12.7388 9.122C12.7388 11.022 11.1999 12.561 9.2998 12.561C7.39975 12.561 5.8608 11.022 5.8608 9.122C5.8608 7.22195 7.39975 5.683 9.2998 5.683ZM9.2998 11.1854C10.439 11.1854 11.3632 10.2612 11.3632 9.122C11.3632 7.98283 10.439 7.0586 9.2998 7.0586C8.16063 7.0586 7.2364 7.98283 7.2364 9.122C7.2364 10.2612 8.16063 11.1854 9.2998 11.1854Z" fill="#828282"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body"  id="ELEMENT15">
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_9.2_chart" style="height: 350px; min-height: 365px;"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--begin::Labels-->
                                    <div class="mx-auto">
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px me-2" style="background: #60def5; "></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-bold text-muted" id ="current_month_3">Current Month</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                         <!--begin::Label-->
                                         <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px me-2" style="background: #fff707; "></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-bold text-muted" id="previous_month_3">Previous Month</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                <!--end::Body-->
                            </div>
                            <!--end::Charts Widget 1-->
                        </div>
                        <div class="col-md-12 infoGraph" style="display: none">
                            <!--begin::Charts Widget 1-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-2 mb-1">IVRS Functional Status</span>
                                            <!-- <span class="text-muted fw-bold fs-7">More than 400 new members</span> -->
                                        </h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar" data-select2-id="select2-data-124-alpu">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary h-auto" id="BTN12">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                                                    <path d="M1.734 2.75984H4.65715L5.35355 0.808207C5.40166 0.674662 5.48983 0.559227 5.60601 0.477671C5.72219 0.396114 5.86071 0.352414 6.00266 0.352539H12.5969C12.8871 0.352539 13.1472 0.535236 13.2439 0.808207L13.9425 2.75984H16.8656C17.8156 2.75984 18.5851 3.52932 18.5851 4.47934V14.2805C18.5851 15.2305 17.8156 16 16.8656 16H1.734C0.783972 16 0.0144939 15.2305 0.0144939 14.2805V4.47934C0.0144939 3.52932 0.783972 2.75984 1.734 2.75984ZM1.56205 14.2805C1.56205 14.3751 1.63942 14.4525 1.734 14.4525H16.8656C16.9602 14.4525 17.0376 14.3751 17.0376 14.2805V4.47934C17.0376 4.38477 16.9602 4.30739 16.8656 4.30739H12.8527L12.4852 3.27999L11.993 1.90009H6.60878L6.11658 3.27999L5.74903 4.30739H1.734C1.63942 4.30739 1.56205 4.38477 1.56205 4.47934V14.2805ZM9.2998 5.683C11.1999 5.683 12.7388 7.22195 12.7388 9.122C12.7388 11.022 11.1999 12.561 9.2998 12.561C7.39975 12.561 5.8608 11.022 5.8608 9.122C5.8608 7.22195 7.39975 5.683 9.2998 5.683ZM9.2998 11.1854C10.439 11.1854 11.3632 10.2612 11.3632 9.122C11.3632 7.98283 10.439 7.0586 9.2998 7.0586C8.16063 7.0586 7.2364 7.98283 7.2364 9.122C7.2364 10.2612 8.16063 11.1854 9.2998 11.1854Z" fill="#828282"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body"  id="ELEMENT12">
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_10_chart" style="height: 350px; min-height: 365px;"></div>
                                        <!--end::Chart-->
                                    </div>
                                    
                                <!--end::Body-->
                            </div>
                            <!--end::Charts Widget 1-->
                        </div>
                        <div class="col-md-12 infoGraph" style="display: none">
                            <!--begin::Container-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <!-- <span class="card-label fw-bolder fs-3 mb-1">Stakeholder Listened to IVRS Content</span> -->
                                        <!-- <span class="text-muted fw-bold fs-7">More than 400 new members</span> -->
                                    </h3>
                                    <!--end::Title-->
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar" data-select2-id="select2-data-124-alpu">
                                        <!--begin::Menu-->
                                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary h-auto" id="BTN14">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                                                <path d="M1.734 2.75984H4.65715L5.35355 0.808207C5.40166 0.674662 5.48983 0.559227 5.60601 0.477671C5.72219 0.396114 5.86071 0.352414 6.00266 0.352539H12.5969C12.8871 0.352539 13.1472 0.535236 13.2439 0.808207L13.9425 2.75984H16.8656C17.8156 2.75984 18.5851 3.52932 18.5851 4.47934V14.2805C18.5851 15.2305 17.8156 16 16.8656 16H1.734C0.783972 16 0.0144939 15.2305 0.0144939 14.2805V4.47934C0.0144939 3.52932 0.783972 2.75984 1.734 2.75984ZM1.56205 14.2805C1.56205 14.3751 1.63942 14.4525 1.734 14.4525H16.8656C16.9602 14.4525 17.0376 14.3751 17.0376 14.2805V4.47934C17.0376 4.38477 16.9602 4.30739 16.8656 4.30739H12.8527L12.4852 3.27999L11.993 1.90009H6.60878L6.11658 3.27999L5.74903 4.30739H1.734C1.63942 4.30739 1.56205 4.38477 1.56205 4.47934V14.2805ZM9.2998 5.683C11.1999 5.683 12.7388 7.22195 12.7388 9.122C12.7388 11.022 11.1999 12.561 9.2998 12.561C7.39975 12.561 5.8608 11.022 5.8608 9.122C5.8608 7.22195 7.39975 5.683 9.2998 5.683ZM9.2998 11.1854C10.439 11.1854 11.3632 10.2612 11.3632 9.122C11.3632 7.98283 10.439 7.0586 9.2998 7.0586C8.16063 7.0586 7.2364 7.98283 7.2364 9.122C7.2364 10.2612 8.16063 11.1854 9.2998 11.1854Z" fill="#828282"/>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                    <div class="card-body d-flex align-items-center justify-contentc-center flex-column "  id="ELEMENT14">
                                        <!--begin::Title-->
                                        <div class="fs-2 fw-bolder text-gray-900 text-center mb-5">Stakeholder Listened to IVRS Content</div>
                                        <!--end::Title-->
                                        <div class="d-flex align-items-center justify-contentc-around">
                                            <!--begin::Chart-->
                                            <div class="chirt_content">
                                                <div id="kt_chart_widgets_22_chart_1" class="mx-auto mb-4"></div>
                                                <!--begin::Label-->
                                                <div class="d-flex align-items-center justify-content-center mb-2">
                                                    <!--begin::Bullet-->
                                                    <!-- <div class="bullet bullet-dot w-8px h-7px me-2" style="background: #60def5; "></div> -->
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <div class="fs-2 fw-bold text-gray-900" id ="current_month_p1">Current Month</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Label-->

                                            </div>
                                            <div class="chirt_content">
                                                <div id="kt_chart_widgets_22_chart_2" class="mx-auto mb-4"></div>
                                                <!--begin::Label-->
                                                <div class="d-flex align-items-center justify-content-center mb-2">
                                                    <!--begin::Bullet-->
                                                    <!-- <div class="bullet bullet-dot w-8px h-7px me-2" style="background: #fff707; "></div> -->
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <div class="fs-2 fw-bold text-gray-900" id="previous_month_p2">Previous Month</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Chart-->
                                        </div>
                                    
                                        <!--begin::Labels-->
                                        <div class="mx-auto">
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Bullet-->
                                                <div class="bullet bullet-dot w-8px h-7px bg-info me-2"></div>
                                                <!--end::Bullet-->
                                                <!--begin::Label-->
                                                <div class="fs-8 fw-bold text-muted" id="field_student">Student</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Bullet-->
                                                <div class="bullet bullet-dot w-8px h-7px bg-success me-2"></div>
                                                <!--end::Bullet-->
                                                <!--begin::Label-->
                                                <div class="fs-8 fw-bold text-muted" id="field_teacher">Teacher</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Bullet-->
                                                <div class="bullet bullet-dot w-8px h-7px bg-primary me-2"></div>
                                                <!--end::Bullet-->
                                                <!--begin::Label-->
                                                <div class="fs-8 fw-bold text-muted" id = "field_govt">Govt. Official</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Label-->
                                        
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Bullet-->
                                                <div class="bullet bullet-dot w-8px h-7px bg-danger me-2"></div>
                                                <!--end::Bullet-->
                                                <!--begin::Label-->
                                                <div class="fs-8 fw-bold text-muted" id="field_staff">Staff</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Label-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Bullet-->
                                                <div class="bullet bullet-dot w-8px h-7px bg-warning me-2"></div>
                                                <!--end::Bullet-->
                                                <!--begin::Label-->
                                                <div class="fs-8 fw-bold text-muted" id="field_staff">Unspecified</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Labels-->
                                    </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Container-->
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
            // success alert
           $('#toDate').datepicker({
               changeMonth: true,
               changeYear: true,
               showButtonPanel: true,
               dateFormat: 'mm yy',
               onClose: function(dateText, inst) {
                   $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
               }
           });
    </script>
@endpush

