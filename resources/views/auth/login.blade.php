@extends('front.master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}" >
                @csrf

                <div class="mb-3">

                    <label for="">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="mb-3">
                    <label for="">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="mb-3">
                <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label for="">{{ __('Remember Me') }}</label>
                </div>
                </div>

                <div class="mb-0">

                <button type="submit" class="site-btn w-100">{{ __('Login') }}</button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                </div>
                <div class="mb-0">
                    <p class="btn btn">New Account?
                <a class="btn btn-link" href="{{ route('register') }}">
                    Register
                    </a></p>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
