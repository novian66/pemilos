@extends('layouts.auth')
@section('title')
    New Register Account
@endsection

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('dist/img/logo.svg') }}" height="36" alt="">
            </a>
        </div>
        <form class="card card-md" action="{{ route('register') }}" method="post">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Create your account</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Enter name" required autocomplete="off">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password" autocomplete="off" required autocomplete="off">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">
                                Repeat Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Password" autocomplete="off" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 mt-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" />
                        <span class="form-check-label">Saya Setuju dengan Term Of Service</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </div>
            <div class="hr-text">or</div>
            <div class="card-body">
                <div class="text-center text-muted mt-0">
                    have account yet? <a href="{{ route('login') }}" tabindex="-1">Login</a>
                </div>
            </div>
        </form>
    </div>
@endsection
