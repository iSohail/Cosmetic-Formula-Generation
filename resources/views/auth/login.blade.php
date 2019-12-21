@extends('layouts.default')

@section('content')
{{-- <div style="margin: 100px auto">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
@csrf
<span class="login100-form-title p-b-26">
    Welcome

</span>
<span class="login100-form-title p-b-48">
    <i class="zmdi zmdi-font"></i>
</span>

<div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">

    <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required
        autocomplete="email" autofocus>
    <span class="focus-input100" data-placeholder="Email"></span>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="wrap-input100 validate-input" data-validate="Enter password">
    <span class="btn-show-pass">
        <i class="zmdi zmdi-eye"></i>
    </span>

    <input id="password" type="password" class="input100" name="password" required autocomplete="current-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <span class="focus-input100" data-placeholder="Password"></span>
</div>
<div class="form-group row">
    <div class="col-md-12 ">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>
</div>
<div class="container-login100-form-btn">
    <div class="wrap-login100-form-btn">
        <div class="login100-form-bgbtn"></div>
        <button type="submit" class="login100-form-btn">
            {{ __('Login') }}
        </button>

    </div>
</div>



<div class="text-center p-t-115">
    <span class="txt1">
        Don’t have an account?
    </span>

    <a class="txt2" href="/register">
        Sign Up
    </a>
</div>

@if (Route::has('password.request'))
<a href="{{ route('password.request') }}">Forgot Your Password?
</a>
@endif
</form>
</div>
</div>
</div>
--}}



<style>
    body {
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(146, 70, 252, 1) 100%);
    }

    .form-control {
        border-color: #565656;
    }
</style>










<div class="row justify-content-center my-5 mx-auto" style="position:relative">
    <div class="col-md-8">
        <div class="card" style="margin-top: 100px;">
            <div class="card-header" style="background:#d6d6d6">
                <h4 class="py-2 text-center">Login</h4>
            </div>

            <div class="card-body" style="background:#fff">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 mx-auto">

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Don’t have an account?
                        </span>

                        <a class="txt2" href="/register">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection