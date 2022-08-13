@extends('layouts.theme.master')
@section('title')
    QuickCount
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center" style="border-radius:20px;">
                <div class="col-md-5">
                    <div class="card p-3 shadow-sm rounded">
                        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_xbf1be8x.json"
                            background="transparent" speed="1" loop autoplay></lottie-player>
                        <h3 class="text-center text-muted">Token Election</h3>
                        <p class="text-center text-muted">Harap Masukan Token Election School yang kamu dapatkan dari pihak
                            sekolah</p>
                        <form action="" method="POST">
                            <div class="row g-2">
                                @csrf
                                <div class="col">
                                    <input type="text" name="token" class="form-control" placeholder="Search for…">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-white btn-icon" aria-label="Button">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="10" cy="10" r="7"></circle>
                                            <line x1="21" y1="21" x2="15" y2="15"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
