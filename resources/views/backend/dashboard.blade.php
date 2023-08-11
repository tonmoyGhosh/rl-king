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
                               
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <a href={{ route('dashboard') }} class="card-header fs-1">
                                        <img alt="Logo" src="{{asset('metch')}}/media/logos/app_logo.jpg" class="page_speed_8658815" style="object-fit: contain; max-width: 100%;  width: 150px;">
                                    </a>
                                </div>

                                <div class="col-sm-12">
                                @if($role_name == 'Admin' || $role_name == 'Super Admin')
                                
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                
                                                <th col-span="2">Active Statistical Reports</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Total Coin Agency Users:</td>
                                                <td><b>{{ $total_coin_agency }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Total Host Agency Users:</td>
                                                <td><b>{{ $total_host_agency }}</b></td>
                                            </tr>
                                           
                                            <tr>
                                                <td>Coin Agency Total Transaction Amount:</td>
                                                <td><b>{{ $total_coin_agency_amount_approved }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Coin Agency Total Transaction Coin:</td>
                                                <td><b>{{ $total_coin_approved_coin_agency }}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                @endif
                                </div>
                            </diV>

                            @if($role_name == 'Coin Agency')
                            <div class="col-sm-12">
                                
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th col-span="2">Wallet Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td>Total Amount :</td>
                                            <td><b>{{ $total_amount }}</b></td>
                                        </tr> --}}
                                        <tr>
                                            <td>Total Coin :</td>
                                            <td><b>{{ $total_coin }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Total Coin Send :</td>
                                            <td><b>{{ $total_coin_send }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            @endif
                                
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