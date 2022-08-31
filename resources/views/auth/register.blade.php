@extends('layouts.auth')
@section('title')
    Buat Akun Siballu
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Nama lengkap" required autocomplete="off">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Email" required autocomplete="off">
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
                                Kata Sandi
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Kata Sandi" autocomplete="off" required autocomplete="off">
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
                                Ulangi Kata Sandi
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Kata Sandi" autocomplete="off" required
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 mt-3">
                    <label class="form-check">
                        <input type="checkbox" name="tos" class="form-check-input @error('tos') is-invalid @enderror" />
                        @error('tos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="form-check-label">Saya Setuju dengan Aturan Yang Ada</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </div>
            </div>
            <div class="hr-text">atau</div>
            <div class="card-body">
                <div class="text-center text-muted mt-0">
                   Sudah punya akun? <a href="{{ route('login') }}" tabindex="-1">Masuk</a>
                </div>
            </div>
        </form>
    </div>
@endsection
