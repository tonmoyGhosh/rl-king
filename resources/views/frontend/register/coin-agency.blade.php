
@extends('layouts.frontend_app')

@section('content')

    <a href={{ route('dashboard') }}>
        <img alt="Logo" src="{{asset('metch')}}/media/logos/app_logo.jpg" class="page_speed_8658815" style="object-fit: contain; max-width: 100%;  width: 150px;">
    </a>
    <br><br>

    <h3 style="color: #3699ff"><b></b>Apply As Coin Agency</b></h3>
    <br>

    <form id="formDiv" method="POST" action="{{ route('coinAgencyRegisterStore') }}">
        @csrf
        
        <div class="form-group">
            <input class="form-control h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="Name" name="name" id="name" value="" autofocus/>
            <p id="name_msg" style="color: red"></p>
        </div>

        <div class="form-group">
            <input class="form-control h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="email" placeholder="Email" name="email" id="email" value="" autofocus/>
            <p id="email_msg" style="color: red"></p>
        </div>

        <div class="form-group">
            <input class="form-control h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="Contact Number (WhatsApp Number Required)" name="phone_no" id="phone_no" value="" autofocus/>
            <p id="phone_no_msg" style="color: red"></p>
        </div>

        <div class="form-group text-center mt-10">
            <button type="button" class="btn btn-primary btn-pill font-weight-bold opacity-90 px-15 py-3" id="submit">Submit Form</button>
            <a type="button" href="{{ route('home') }}" class="btn btn-primary btn-pill font-weight-bold opacity-90 px-15 py-3">Back To Home</a>
        </div>

    </form>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $('#name, #email, #phone_no').keyup(function (e)
    {
        if($(this).attr('id') == 'name') $('#name_msg').html('');
        if($(this).attr('id') == 'email') $('#email_msg').html('');
        if($(this).attr('id') == 'phone_no') $('#phone_no_msg').html('');
    });

    $('document').ready(function ()
    {   
        // success alert
        function swal_success(msg) 
        {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: msg,
                showConfirmButton: false,
                timer: 1000
            })
        }

        // error alert
        function swal_error() 
        {
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: 'Something goes wrong!',
                showConfirmButton: true,
            })
        }

        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function (e)
        {
            e.preventDefault();

            $.ajax({
                data: $('#formDiv').serialize(),
                url: "{{ route('coinAgencyRegisterStore') }}",
                type: "POST",
                dataType: 'json',
                success: function (data)
                {   
                    $('#name_msg').html('');
                    $('#email_msg').html('');
                    $('#phone_no_msg').html('');

                    if(data.errors) 
                    {   
                        if (data.errors.name)
                            $('#name_msg').html(data.errors.name[0]);
                        if (data.errors.email)
                            $('#email_msg').html(data.errors.email[0]);
                        if (data.errors.phone_no)
                            $('#phone_no_msg').html(data.errors.phone_no[0]);
                    } 
                    else if(data.status == true) 
                    {
                        $('#formDiv').trigger("reset");
                        Swal.fire({
                            title: 'Successfully Done',
                            text: data.message
                        });
                    } 
                    else
                    {   
                        $('#formDiv').trigger("reset");
                        Swal.fire({
                            title: 'Oops...',
                            text: data.message
                        });
                    }

                },
                error: function (data)
                {
                    $('#formDiv').trigger("reset");
                    Swal.fire({
                        title: 'Oops...',
                        text: 'Something went wrong! Please try another'
                    });
                    
                }
            });

        });

    });

</script>

@endpush