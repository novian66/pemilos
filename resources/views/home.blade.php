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
                                Hai <strong class="text-danger">{{ auth()->user()->name }}</strong> Apa Kabar ? Semoga Sehat
                                Selalu, Yuk Join Langsung Sesuai
                                Sekolah Kamu
                            </p>
                            <div class="empty-action">
                                <a href="{{ route('user.editProfile') }}" class="btn btn-primary">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="10" cy="10" r="7"></circle>
                                        <line x1="21" y1="21" x2="15" y2="15"></line>
                                    </svg>
                                    gabung Sekolah
                                </a>
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
