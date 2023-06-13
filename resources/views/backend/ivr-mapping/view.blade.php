@extends('layouts.backend_app')

@section('title', 'IVR Mapping Details')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('ivr-mapping.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewUser">
                            <i class="fas fa-users"></i>IVR Mapping List</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-12">
                        <h4>IVR Flows</h4>
                        <div class="d-flex justify-content-between">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>IVR Mapping Title:</label>
                                </div>
                                <div class="col-sm-6">
                                    {{ $ivrMapping->title }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Intro Audio</label>
                                </div>
                                <div class="col-sm-6">
                                    <audio controls>
                                        <source src="{{$ivrMapping->intro_url}}" type="audio/mpeg">
                                    </audio>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Expectation Audio</label>
                                </div>
                                <div class="col-sm-6">
                                    <audio controls>
                                        <source src="{{$ivrMapping->input_list_url}}" type="audio/mpeg">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <h5>IVR Steps</h5>
                        @foreach($ivrMapping->ivr_step as $parentStep)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Title</label>
                                        <input type="text"  value="{{$parentStep->title}}" class="form-control" disabled>
                                    </div>

                                    <div class="col-sm-2">
                                        <label>Key Press</label>
                                        <input type="text"  value="{{$parentStep->key_press}}" class="form-control" disabled>
                                    </div>

                                    <div class="col-sm-2">
                                        <label>Node Type</label>
                                        <input type="text"  value="{{$parentStep->type}}" class="form-control" disabled>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Expectation Audio</label>
                                        <audio controls>
                                            <source src="{{$parentStep->clip_url}}" type="audio/mpeg">
                                        </audio>
                                    </div>

                                    <div class="col-sm-1">
                                        <label>level</label>
                                        <input type="text"  value="{{$parentStep->level}}" class="form-control" disabled>
                                    </div>
                                </div>
                                    @foreach($parentStep->childSteps as $childSteps)
                                        <div class="form-group" style="padding-left: 40px">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label>Title</label>
                                                    <input type="text"  value="{{$childSteps->title}}" class="form-control" disabled>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Key Press</label>
                                                    <input type="text"  value="{{$childSteps->key_press}}" class="form-control" disabled>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Node Type</label>
                                                    <input type="text"  value="{{$childSteps->type}}" class="form-control"  disabled>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Expectation Audio</label>
                                                    <audio controls>
                                                        <source src="{{$childSteps->clip_url}}" type="audio/mpeg">
                                                    </audio>
                                                </div>

                                                <div class="col-sm-1">
                                                    <label>level</label>
                                                    <input type="text"  value="{{$childSteps->level}}" class="form-control" disabled>
                                                </div>
                                            </div>
                                      </div>
                                    @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
