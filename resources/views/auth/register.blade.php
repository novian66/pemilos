@extends('layouts.auth')
@section('title')
    Buat Akun Siballu
@endsection

@section('content')
    <div class="container py-4">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('dist/img/logo.png') }}" height="36" alt="">
            </a>
        </div>
        <form class="card card-md" action="{{ route('register') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor NISN</label>
                            <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                value="{{ old('nisn') }}" placeholder="Nomor Nisn" required autocomplete="off">
                            @error('nisn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>NISN tidak sesuai</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor NIK (<small>OPSIONAL</small>)</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"
                                value="{{ old('nik') }}" placeholder="Nomor nik" autocomplete="off">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>NIK tidak sesuai</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Nama lengkap" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Email" required autocomplete="off">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Email tidak valid</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="form-selectgroup w-100">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="L" class="form-selectgroup-input" {{old('jenis_kelamin') == 'L' ? 'checked' : ''}}>
                                    <span class="form-selectgroup-label">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                        </svg>
                                        Pria
                                    </span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="P" class="form-selectgroup-input" {{old('jenis_kelamin') == 'P' ? 'checked' : ''}}>
                                    <span class="form-selectgroup-label">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>
                                        Wanita
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Telp</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" placeholder="Nama lengkap" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal lahir</label>
                            <input type="date" class="form-control @error('ultah') is-invalid @enderror" name="ultah"
                                value="{{ old('ultah') }}" placeholder="ultah" required autocomplete="off">
                            @error('ultah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Email tidak valid</strong>
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
                                    name="password" placeholder="Kata Sandi" autocomplete="off" required
                                    autocomplete="off">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Kata sandi harus lebih dari 8</strong>
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
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Kata Sandi" autocomplete="off" required
                                    autocomplete="off">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Kata sandi tidak sesuai</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 mt-3">
                    <label class="form-check">
                        <input type="checkbox" name="tos"
                            class="form-check-input @error('tos') is-invalid @enderror" />
                        @error('tos')
                            <span class="invalid-feedback" role="alert">
                                <strong>Anda harus setuju dengan aturan yang ada</strong>
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
