@extends('layouts.backend_app')

@section('title', 'Dashboard')

@section('content')

<div class="d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <!--end::Subheader-->
    <!--begin::Entry-->


    <div class="d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container" id="dashboard-data">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xxl-12 mb-5 mb-xl-10">
                        <div class="card card-flush">

                            <h2 class="card-header fs-1" id="dashboard">
                               Welcome to RL KING Dashboard
                            </h2>

                            <a href={{ route('dashboard') }} class="card-header fs-1">
                                <img alt="Logo" src="{{asset('metch')}}/media/logos/app_logo.jpg" class="page_speed_8658815" style="object-fit: contain; max-width: 100%;  width: 150px;">
                            </a>
                            <br><br>
                                
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>



    <!--end::Entry-->
</div>


@endsection