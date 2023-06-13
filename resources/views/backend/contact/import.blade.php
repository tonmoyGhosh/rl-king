@extends('layouts.backend_app')

@section('title', 'Import Contact')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{$title}}</h2>

            </div>

            <div class="card-body">
                <div class="col-md-12">

                    <form id="formDiv" name="formDiv" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Group:</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="group_id" id="group_id">
                                        <option value="">Select Group</option>
                                        @foreach ($groupList as $item)
                                        <option {{ old('group_id') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


{{--                        <div class="form-group">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-2">--}}
{{--                                    <label>Download File<span style="color: red">*</span></label>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <a class="btn btn-primary" href="/storage/excel/contacts.xlsx" download>Click Here</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Upload File(xlsx)<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" name="xlsFile" class="form-control" id="xlsFile">
                                    <p id="" style="color: red"></p>
                                    <a class="float-right" href="/storage/excel/contact_sample.xlsx" download>Sample Download File</a>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('contacts.index') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
                            <button type="submit" class="btn btn-primary font-weight-bold" id="saveBtn">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@push('scripts')



<script>

    function validate(){
        $('#xlsFile').on('change', function() {
            var fileInput = this;
            var filePath = fileInput.value;
            var allowedExtensions = /(\.xlsx)$/i;
            if(!allowedExtensions.exec(filePath)){
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Please upload file having extensions .xlsx',
                    showConfirmButton: true,
                })
                fileInput.value = '';
                return false;
            }
        });
    }

    $('document').ready(function() {
        validate()
        // success alert
        function swal_success(msg) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: msg,
                showConfirmButton: false,
                timer: 1000
            })
        }


        // error alert
        function swal_error(message) {
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: message,
                showConfirmButton: true,
            })
        }

        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // initialize btn save
        $('#formDiv').submit(function(e) {
            e.preventDefault();
            $('.preloader').show()

            $.ajax({
                type: 'POST',
                url: "{{ route('contacts.import') }}",
                //url: "/hi",
                enctype: 'multipart/form-data',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.preloader').hide()

                    if (data.status == true) {
                        $('#formDiv').trigger("reset");
                        swal_success(data.message);
                        window.setTimeout( function(){
                            window.location = "{{ route('contacts.index') }}"
                        }, 100 )
                    } else{

                        swal_error(data.responseJSON.errors[0]);
                        $('.preloader').hide()
                    }

                },
                error: function(data) {
                    swal_error(data.responseJSON.message);
                    $('.preloader').hide()

                }
            });

        });

    });
</script>
@endpush
