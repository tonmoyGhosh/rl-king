@extends('layouts.backend_app')

@section('title', 'Master Report Usage Voice')

@section('content')

<style>
    .docSection {
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
                            <h5>VOICE MASTER REPORT</h5>
                            <p><b>Panel URL: </b><a target="blank" href=https://103.251.120.243:8444 /> https://103.251.120.243:8444/</a></p>
                            <br>

                            <p><b>User Name:</b> mukaddas</p>
                            <p><b>Password:</b> abc@1234</p>
                            <br>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection