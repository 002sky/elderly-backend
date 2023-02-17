@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="login-section">
    <div class="layer"></div>
    <div class="container">
        <div class="top-section">
            <h1 class="page-title">Login</h1>
        </div>
        <div class="left-section">
            <!-- <img src="./images/logo.png" alt=""> -->
            <img src="./images/WeCare-logos_black.png" alt="">

        </div>
        <div class="right-section">
            <form>

                <div class="form-row">
                    <div class="input">
                        <div class="icon">
                            <i class="fas fa-user-circle"></i>
                        </div>

                        <input type="text" id="email" name="email" placeholder="Email">
                    </div>
                    <!--error message-->

                    <!-- <div class="message">
                        @error('email')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> -->
                </div>
                <div class="form-row">
                    <div class="input">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <!--error message-->
                    <!-- <div class="message">
                        @error('password')
                        <span class="" role="">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> -->
                </div>
                <div class="form-row">
                    <button type="submit" class="btn-login">Login</button>
                </div>
                <!-- <div class="form-row">
                    <span>Do not have an account? <a href="#">Click here</a> </span>
                </div> -->
            </form>
        </div>
    </div>
</div>
@endsection
