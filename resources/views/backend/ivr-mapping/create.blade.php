@extends('layouts.backend_app')

@section('title', 'Create IVR Mapping')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('ivr-mapping.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder">
                            <i class="fas fa-users"></i>IVR Mapping List</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-12">

                        <form id="formDiv" name="formDiv" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label>IVR Mapping Title:<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="ivr_mapping_title" class="form-control" id="title" placeholder="Enter Your title">
                                        <p id="" style="color: red"></p>
                                    </div>

                                </div>
                            </diV>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label>Pre Recorded Intro<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" name="pre_recorded_file" class="form-control" id="pre_record_file">
                                        <p id="" style="color: red"></p>
                                    </div>
                                </div>
                            </diV>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label>Expectation File<span style="color: red">*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" name="expectation_file" class="form-control" id="expectation_file" >
                                        <p id="" style="color: red"></p>
                                    </div>
                                </div>
                            </diV>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 d-flex justify-content-between">
                                        <label style="font-size: 1.3rem"><b>IVR Tree Details</b></label>
                                    </div>
                                </div>
                            </div>


                            <div class="parentwithchildren">
                                <div class="form-group parent">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Title</label>
                                            <input type="text" name="title[]" class="form-control" id="title" placeholder="title">
                                        </div>

                                        <div class="col-sm-2">
                                            <label>Key Press</label>
                                            <input type="text" name="key_press[]" class="form-control" id="key_press" placeholder="key press">
                                        </div>

                                        <div class="col-sm-2">
                                            <label>Node Type</label>
                                            <select class="form-control" name="node_type[]"
                                                    id="node_type">
                                                @php
                                                    $publishOptions = array();
                                                    $publishOptions['Play'] = 'Play';
                                                    $publishOptions['API Call'] = 'API Call';

                                                @endphp
                                                <option value="">Select Options</option>
                                                @foreach ($publishOptions as $k=>$v)
                                                    <option
                                                        {{ old('node_type') == $k ? "selected" : "" }} value="{{ $k }}">{{ ucwords(str_replace('-',' ',$v)) }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Upload Voice</label>
                                            <input type="file" name="upload_voice[]" class="form-control" id="upload_voice" onChange="validate()">
                                        </div>
                                        <div class="col-sm-1">
                                            <label>level</label>
                                            <input type="text" name="level[]" value="1" class="form-control" id="level" placeholder="level" readonly>
                                        </div>

                                        <div class="col-sm-1">
                                            <label>Action</label>
                                            <div class="d-flex justify-content-between">
                                                <div type="button"
                                                     class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 delete" onclick="removeParent(event)">
                                                    <i class="fi-rr-trash"></i>
                                                </div>
                                                <button type="button"
                                                     class="btn btn-sm btn-icon btn-outline-primary btn-circle mr-2 add" id="add_fields">
                                                    <i class="fi-rr-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group children" style=" padding-left: 40px;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label>Title</label>
                                                <input type="text" name="title[]" class="form-control" id="title" placeholder="title">
                                            </div>

                                            <div class="col-sm-2">
                                                <label>Key Press</label>
                                                <input type="text" name="key_press[]" class="form-control" id="key_press" placeholder="key press">
                                            </div>

                                            <div class="col-sm-2">
                                                <label>Node Type</label>
                                                <select class="form-control" name="node_type[]"
                                                        id="node_type">
                                                    @php
                                                        $publishOptions = array();
                                                        $publishOptions['Play'] = 'Play';
                                                        $publishOptions['API Call'] = 'API Call';
                                                    @endphp
                                                    <option value="">Select Options</option>
                                                    @foreach ($publishOptions as $k=>$v)
                                                        <option
                                                            {{ old('node_type') == $k ? "selected" : "" }} value="{{ $k }}">{{ ucwords(str_replace('-',' ',$v)) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-3">
                                                <label>Upload Voice</label>
                                                <input type="file" name="upload_voice[]" class="form-control" id="upload_voice" onChange="validate()">
                                            </div>
                                            <div class="col-sm-1">
                                                <label>level</label>
                                                <input type="text" name="level[]" value="2" class="form-control" id="level" placeholder="level" readonly>
                                            </div>

                                            <div class="col-sm-1" >
                                                <label>Action</label>
                                                <div id="delete"
                                                     class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 c-delete" onclick="remove(event)">
                                                    <i class="fi-rr-trash"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">
                                <a href="{{ route('ivr-mapping.index') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
                                <button type="submit" class="btn btn-primary font-weight-bold" id="saveBtn">
{{--                                    <span class="spinner-border text-success" role="status" style="display: none">--}}
{{--                                        <span class="visually-hidden">Loading...</span>--}}
{{--                                    </span>--}}
{{--                                    <span>--}}
{{--                                        Save--}}
{{--                                    </span>--}}
                                    save
                                </button>
                                <div data-toggle="tooltip"  data-original-title="Add"
                                     class="btn btn-sm btn-icon btn-outline-primary btn-circle mr-2 add" id="addRow">
                                    <i class="fi-rr-plus"></i>
                                </div>
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
        function createElementFromHTML(htmlString) {
            var div = document.createElement('div');
            div.innerHTML = htmlString.trim();

            // Change this to div.childNodes to support multiple top-level nodes.
            return div.firstChild;
        }


        var i =2
        $("#addRow").click(function(){

            var parent =
                '<div class="form-group parent">'+
                    '<div class="row">'+
                         '<div class="col-sm-3">'+
                              '<label>Title</label>'+
                              '<input type="text" name="title[]" class="form-control" id="title" placeholder="title">'+
                          '</div>'+

                          '<div class="col-sm-2">'+
                             '<label>Key Press</label>'+
                             '<input type="text" name="key_press[]" class="form-control" id="key_press" placeholder="key press">'+
                         '</div>'+

                        '<div class="col-sm-2">'+
                            '<label>Node Type</label>'+
                            '<select class="form-control" name="node_type[]" id="node_type">'+
                                '<option value="">Select Options</option>'+
                                '<option value"Play">Play</option>'+
                                '<option value"API Call">API Call</option>'+
                            '</select>'+
                        '</div>'+

                        '<div class="col-sm-3">'+
                            '<label>Upload Voice</label>'+
                            '<input type="file" name="upload_voice[]" class="form-control" id="upload_voice" onChange="validate()">'+
                        '</div>'+
                        '<div class="col-sm-1">'+
                            '<label>level</label>'+
                            '<input type="text" name="level[]" value="1" class="form-control" id="level" placeholder="level" readonly>'+
                        '</div>'+

                        '<div class="col-sm-1" >'+
                        '<label>Action</label>'+
                        '<div class="d-flex justify-content-between">'+
                            '<div id="delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 c-delete" onclick="removeParent(event)">'+
                                '<i class="fi-rr-trash"></i>'+
                             '</div>'+
                             '<button type="button" class="btn btn-sm btn-icon btn-outline-primary btn-circle mr-2 add" id="add_fields'+ i +' ">'+
                                 '<i class="fi-rr-plus"></i>'+
                            '</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="form-group children" style=" padding-left: 40px;">'+
                '</div>'+
                '</div>';

            $(".parentwithchildren").append(parent);
            validate();
            addChild();
            i++;
        });

        function removeParent(event){
            // console.log(event.target.parentElement.parentElement.parentElement.parentElement.parentElement);
            var current_parent = event.target.closest(".parent")
            current_parent.remove();
        }
    </script>


    <script>

        var i =3

        function addChild() {
           $("button[id^='add_fields']").unbind('click');
           $("button[id^='add_fields']").click(function(){
               var child =
                   '<div class="form-group">'+
                   '<div class="row">'+
                   '<div class="col-sm-3">'+
                   '<label>Title</label>'+
                   '<input type="text" name="title[]" class="form-control" id="title" placeholder="title">'+
                   '</div>'+

                   '<div class="col-sm-2">'+
                   '<label>Key Press</label>'+
                   '<input type="text" name="key_press[]" class="form-control" id="key_press" placeholder="key press">'+
                   '</div>'+

                   '<div class="col-sm-2">'+
                   '<label>Node Type</label>'+
                   '<select class="form-control" name="node_type[]" id="node_type">'+
                   '<option value="">Select Options</option>'+
                   '<option value"Play">Play</option>'+
                   '<option value"API Call">API Call</option>'+
                   '</select>'+
                   '</div>'+

                   '<div class="col-sm-3">'+
                   '<label>Upload Voice</label>'+
                   '<input type="file" name="upload_voice[]" class="form-control" id="upload_voice" onChange="validate()">'+
                   '</div>'+
                   '<div class="col-sm-1">'+
                   '<label>level</label>'+
                   '<input type="text" name="level[]" value="2" class="form-control" id="level" placeholder="level" readonly>'+
                   '</div>'+

                   '<div class="col-sm-1" >'+
                   '<label>Action</label>'+
                   '<div id="delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 c-delete" onclick="remove(event)">'+
                   '<i class="fi-rr-trash"></i>'+
                   '</div>'+
                   '</div>'+

                   '</div>'+
                   '</div>';

               // $(".children").append(child);
               this.closest('.parent').querySelector('.children').append(createElementFromHTML(child));
               validate();
               // console.log(this.closest('.parentwithchildren').querySelector('.children'))
                   i++;
           });
        }


        function remove(event){
            event.target.parentElement.parentElement.parentElement.remove();
        }

    </script>

    <script>

        function validate(){
            $('#pre_record_file, #expectation_file, #upload_voice').on('change', function() {
                var fileInput = this;
                var filePath = fileInput.value;
                var allowedExtensions = /(\.wav|\.mp3)$/i;
                if(!allowedExtensions.exec(filePath)){
                    Swal.fire({
                        position: 'centered',
                        icon: 'error',
                        title: 'Please upload file having extensions .wav/.mp3',
                        showConfirmButton: true,
                    })
                    fileInput.value = '';
                    return false;
                }
            });
        }

        $('document').ready(function ()
        {
            addChild();
            validate();
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
            function swal_error() {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Something went wrong',
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
            $('#formDiv').submit(function (e)
            {
                e.preventDefault();

                $('.preloader').show()

                $.ajax({
                    type: 'POST',
                    url: "{{ route('ivr-mapping.store') }}",
                    enctype: 'multipart/form-data',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (data)
                    {
                        // console.log(data)
                        $('.preloader').hide()

                        $('#nameMsg').html('');
                        $('#descriptionMsg').html('');
                        if(data.errors)
                        {
                            if(data.errors.name)
                                $('#nameMsg').html(data.errors.name[0]);
                            if(data.errors.description)
                                $('#descriptionMsg').html(data.errors.description[0]);
                        }

                        else if(data.status == true)
                        {
                            $('#formDiv').trigger("reset");
                            swal_success(data.message);
                            window.setTimeout( function(){
                                window.location = "{{ route('ivr-mapping.index') }}"
                            }, 100 )
                        }
                        else {
                            swal_error();
                            $('.preloader').hide()

                        }

                    },
                    error: function (data)
                    {
                        swal_error();
                        $('.preloader').hide()

                    }
                });

            });

        });

    </script>
@endpush
