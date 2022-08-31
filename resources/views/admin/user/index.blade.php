@extends('layouts.theme.master')
@section('title')
    Manajemen Data
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-card">
                @foreach ($role as $user)
                    <div class="col-md-4">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h3 class="card-title">{{ $user->name }}</h3>
                                <p>
                                    Kelola User kamu disini, mulai dari Create Read Update dan Delete User
                                </p>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer text-center">
                                <a href="{{route('users.list', $user->name)}}" class="btn btn-link">Lihat Daftar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection
