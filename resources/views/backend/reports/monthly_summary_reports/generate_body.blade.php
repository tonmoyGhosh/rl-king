@extends('layouts.backend_app')

@section('title', 'Create Generate Body')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                </div>

                <div class="card-body">
                    <div class="col-md-12">

                        <form id="formDiv" name="formDiv" enctype="multipart/form-data" method="POST" action="{{ route('request-monthly-summary-report-generate-body') }}">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Header 1:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="header1" class="form-control" id="header1" placeholder="Enter Your First Header" required>
                                        <p id="header1Msg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>First Massage Body:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea name="message1" class="ckeditor form-control" id="message1"
                                                  placeholder="Enter your First Massage Body " rows="8" cols="50" required></textarea>
                                        <p id="massage1BodyMsg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Header 2:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="header2" class="form-control" id="header2" placeholder="Enter Your Second Header" required>
                                        <p id="header2Msg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <label>Second Massage Body:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea name="message2" class="ckeditor form-control" id="message2"
                                                  placeholder="Enter your Second Massage Body " rows="8" cols="50" required></textarea>
                                        <p id="massage2BodyMsg" style="color: red"></p>
                                    </div>
                                </div>
                            </div>



                            <div class="modal-footer">
                                @if(session()->get('download'))
                                    <a id="download" href="{{ session()->get('download') }}" type="button" class="btn btn-light-primary font-weight-bold" style="display: none;" download="">Download</a>
                                @endif

                                    {{--<a href="{{ route('monthly-summary-report-generate-body') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>--}}
                                <button type="submit" class="btn btn-primary font-weight-bold" id="saveBtn">Proceed</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    @if(session()->get('download'))
        <script>
            download = document.getElementById("download");
            download.click();
        </script>
    @endif

@endsection
