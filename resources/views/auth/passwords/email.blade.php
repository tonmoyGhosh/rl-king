@extends('layouts.frontend_app')

@section('content')

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <input class="form-control @error('email') is-invalid @enderror h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" autofocus autocomplete="email" required/>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group text-center mt-10">
            <button type="submit" class="btn btn-primary btn-pill font-weight-bold opacity-90 px-15 py-3">{{ __('Send Password Reset Link') }}</button>
        </div>

    </form>

@endsection
