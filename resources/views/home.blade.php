@extends('layouts.theme.master')
@section('title')
    Homepage Siballu
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-card">
                <div class="col-sm-6 col-lg-8">
                    <div class="card p-2">
                        <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carousel-indicators" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carousel-indicators" data-bs-slide-to="1" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" alt=""
                                        src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2022/8/12/462de4ea-4acb-4987-84e9-45a14794a72b.jpg.webp">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" alt=""
                                        src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2022/8/13/a2cdbfc5-51d7-4bd1-8f2d-ebf072caa882.jpg">
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
                                <button type="button" class="btn btn-warning">
                                    @if (auth()->user()->getroleNames()[0] == 'student')
                                        @if (empty($school))
                                            Gabung Sekolah
                                        @else
                                            Mulai Memilih
                                        @endif
                                    @elseif (auth()->user()->getroleNames()[0] == 'school')
                                        Kelola Sekolah
                                    @else
                                        Kelola System
                                    @endif
                                </button>
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
