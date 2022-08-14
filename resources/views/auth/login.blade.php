@extends('layouts.auth')
@section('title')
    Login Account
@endsection

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{url('/')}}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('dist/img/logo.svg') }}" height="36"
                    alt="">
                </a>
        </div>
        <form class="card card-md" action="{{ route('login') }}" method="post">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Login to your account</h2>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" placeholder="Enter email" required autocomplete="off">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Password
                        <span class="form-label-description">
                            <a href="./forgot-password.html">I forgot password</a>
                        </span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Password" autocomplete="off" required autocomplete="off">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" />
                        <span class="form-check-label">Remember me on this device</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </div>
            </div>
            <div class="hr-text">or</div>
            <div class="card-body">
                <div class="text-center text-muted mt-0">
                    Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
                </div>
            </div>
        </form>
    </div>
@endsection
