@extends('layouts.auth')
@section('title')
    Masuk Akun Siballu
@endsection

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('dist/img/logo.png') }}" height="36" alt="">
            </a>
        </div>
        <form class="card card-md" action="{{ route('login') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" placeholder="Email" required autocomplete="off">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Email tidak terdaftar!</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Kata Sandi
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Kata Sandi" autocomplete="off" required autocomplete="off">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>Password salah!</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </div>
            </div>
            <div class="hr-text">atau</div>
            <div class="card-body">
                <div class="text-center text-muted mt-0">
                    Belum punya akun? <a href="#" tabindex="-1">Daftar</a>
                </div>
            </div>
        </form>
    </div>
@endsection
