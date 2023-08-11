
@extends('layouts.frontend_app')

@section('content')

    <a href={{ route('home') }}>
        <img alt="Logo" src="{{asset('metch')}}/media/logos/app_logo.jpg" class="page_speed_8658815" style="object-fit: contain; max-width: 100%;  width: 150px;">
    </a>
    <br><br>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <input class="form-control @error('email') is-invalid @enderror h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" autofocus required/>

            @error('email')
                <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input class="form-control @error('password') is-invalid @enderror h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Password" name="password" id="password" autocomplete="current-password" autofocus required/>

            @error('password')
                <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
            {{-- <div class="checkbox-inline">
                <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                <span></span>Remember me</label>
            </div> --}}
        </div>

        <div class="form-group text-center mt-10">
            <button type="submit" class="btn btn-primary btn-pill font-weight-bold opacity-90 px-15 py-3">Sign In</button>
        </div>

    </form>

@endsection