@extends('layouts.backend_app')

@section('title', 'Edit Contact')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h2>{{$title}}</h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewContact">
                        <i class="fas fa-users"></i>Contact List</a>
                </div>
            </div>

            <div class="card-body">
                <div class="col-md-12">

                    <form id="formDiv" name="formDiv">

                        <input type="hidden" name="contact_id" value="{{ $contact->id }}" id="contact_id" />

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Name:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $contact->name }}" placeholder="Name">
                                    <p id="contactNameMsg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Group:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="group_id" id="group_id">
                                        <option value="">Select Group</option>
                                        @foreach ($groupList as $item)
                                        <option {{ old('group_id') == $item->id ? "selected" : ( $contact->group_id == $item->id ? "selected" : "") }} value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Grade:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="grade" class="form-control" id="grade" value="{{ $contact->grade }}" placeholder="Grade">
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Stakeholder:</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="stakeholder" id="stakeholder">
{{--                                        @php--}}
{{--                                            $publishOptions = array();--}}
{{--                                            $publishOptions['Male'] = 'Male';--}}
{{--                                            $publishOptions['Female'] = 'Female';--}}
{{--                                            $publishOptions['Others'] = 'Others';--}}

{{--                                        @endphp--}}
                                        <option value="">Select Stakeholder</option>
                                        @foreach ($stakeholders as $v)
                                            <option {{ old('stakeholder') == $v ? "selected" : ( $contact->stakeholder == $v ? "selected" : "") }} value="{{ $v }}">{{ ucwords(str_replace('-',' ',$v)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p id="contactStakeholderMsg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Occupation:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="occupation" class="form-control" id="occupation" value="{{ $contact->occupation }}" placeholder="Occupation">
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>School:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="school" class="form-control" id="school" value="{{ $contact->school }}" placeholder="School">
                                </div>
                            </div>
                        </diV>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Gender:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="gender" id="gender">
                                        @php
                                        $publishOptions = array();
                                        $publishOptions['Male'] = 'Male';
                                        $publishOptions['Female'] = 'Female';
                                        $publishOptions['Others'] = 'Others';

                                        @endphp
                                        <option value="">Select Gender</option>
                                        @foreach ($publishOptions as $k=>$v)
                                        <option {{ old('gender') == $k ? "selected" : ( $contact->gender == $k ? "selected" : "") }} value="{{ $k }}">{{ ucwords(str_replace('-',' ',$v)) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <p id="contactGenderMsg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Area:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="area" class="form-control" id="area" value="{{ $contact->area }}" placeholder="Area">
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>District:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="district" class="form-control" id="district" value="{{ $contact->district }}" placeholder="District">
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Division:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="division" class="form-control" id="division" value="{{ $contact->division }}" placeholder="Division">
                                </div>
                            </div>
                        </diV>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <label>Phone Number:<span style="color: red">*</span></label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $contact->phone_number }}" placeholder="Phone Number">
                                    <p id="contactNumeberMsg" style="color: red"></p>
                                </div>
                            </div>
                        </diV>


                        <div class="modal-footer">
                            <a href="{{ route('contacts.index') }}" type="button" class="btn btn-light-primary font-weight-bold">Close</a>
                            <button type="button" class="btn btn-primary font-weight-bold" id="updateBtn">Update</button>
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

    $('#phone_number').on('change', function() {
        var fileInput = this;
        var filePath = fileInput.value;
        var pattern=/(^(8801){1}[56789]{1}(\d){8})$/
        if(!pattern.test(filePath)){
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: 'Please upload file having extensions 8801XXXXXXXXX',
                showConfirmButton: true,
            })
            fileInput.value = '';
            return false;
        }
    });

    $('document').ready(function() {
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
        $('#updateBtn').click(function(e) {
            e.preventDefault();
            var contact_id = $('#contact_id').val();
            $('.preloader').show()

            $.ajax({
                data: $('#formDiv').serialize(),
                url: "/contacts/" + contact_id,
                type: "PUT",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('.preloader').hide()

                    $('#contactNameMsg').html('');
                    $('#contactGenderMsg').html('');
                    $('#contactNumeberMsg').html('');

                    if (data.errors) {
                        if (data.errors.name)
                            $('#contactNameMsg').html(data.errors.name[0]);
                        if (data.errors.gender)
                            $('#contactGenderMsg').html(data.errors.gender[0]);
                        if (data.errors.phone_number)
                            $('#contactNumeberMsg').html(data.errors.phone_number[0]);
                    } else if (data.status == true) {
                        swal_success(data.message);
                        window.setTimeout( function(){
                            window.location = "{{ route('contacts.index') }}"
                        }, 100 )
                    } else {
                        swal_error(data.responseJSON.message);
                        $('.preloader').hide()
                    }

                },
                error: function(data) {
                    swal_error(data.message);
                    $('.preloader').hide()
                }
            });

        });

    });
</script>
@endpush
