@extends('layouts.theme.master')
@section('title')
    Tentang Siballu
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('dist/img/siballu.png') }}" height="300" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection
