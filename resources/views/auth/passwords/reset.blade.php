@extends('layouts.frontend_app')

@section('content')

    <div class="login-signin">
        <form method="POST" action="{{ route('password.update') }}">
            <input type="hidden" name="token" value="{{ $token }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control  h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password" class="form-control  h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control  h-auto text-black placeholders opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

            </div>

            <div class="form-group text-center mt-10">
                <button type="submit" class="btn btn-primary btn-pill font-weight-bold opacity-90 px-15 py-3">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
@endsection

