@extends('layouts.theme.master')
@section('title')
    Halaman Utama
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-card">
                <div class="col-sm-6 col-lg-8">
                    <div class="card p-2 mb-3">
                        <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carousel-indicators" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carousel-indicators" data-bs-slide-to="1" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" alt=""
                                        src="{{ asset('dist/img/slider/slider1.jpg') }}">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" alt=""
                                        src="{{ asset('dist/img/slider/slider2.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="empty">
                            <p class="empty-title">Selamat Datang</p>
                            <p class="empty-subtitle text-muted">
                                Hai <strong class="text-danger">{{ auth()->user()->name }}</strong>
                            </p>
                            <span>Apa Kabar ? Semoga Sehat Selalu,</span>
                            @if (!empty($school))
                                <span>Kamu adalah siswa di {{ $school->nama }}</span>
                            @else
                                <p>Yuk
                                    @if (auth()->user()->getroleNames()[0] == 'student')
                                        Join Langsung Sesuai Sekolah
                                    @elseif (auth()->user()->getroleNames()[0] == 'school')
                                        Kelola Sekolah
                                    @else
                                        Kelola Sistem
                                    @endif
                                    Kamu
                                </p>
                            @endif

                            <div class="empty-action">
                                @if (auth()->user()->getroleNames()[0] == 'student')
                                    @if (empty($school))
                                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Gabung Sekolah</a>
                                    @else
                                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Mulai Memilih</a>
                                    @endif
                                @elseif (auth()->user()->getroleNames()[0] == 'school')
                                    <a href="{{ route('school-management') }}" class="btn btn-primary">Kelola Sekolah</a>
                                @else
                                    <a href="{{ route('school.index') }}" class="btn btn-primary">Kelola Sistem</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection
