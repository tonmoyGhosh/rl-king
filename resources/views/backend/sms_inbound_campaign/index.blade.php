@extends('layouts.backend_app')

@section('title', 'Sms Inbound Campaign')

@section('content')

<style>
    .docSection 
    {
        border: 2px outset black;
        background-color: #eff2f5;    
        text-align: center;
    }
</style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{$title}}</h2>
            </div>

            <div class="card-body">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <div class="docSection">

                            <br>
                            <h5>Panel</h5>
                            <p><b>Panel URL: </b><a target="blank" href="http://103.4.147.107/"> http://103.4.147.107/</a></p>
                            <br>

                            <h5>Access Credential for AR</h5>
                            <p><b>User Name:</b> ar_admin</p>
                            <p><b>Password:</b> 123456</p>
                            <br>

                            <h5>Access Credential for AMQ</h5>
                            <p><b>User Name:</b> amq_admin</p>
                            <p><b>Password:</b> hJ2&nE</p>
                            <br>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection