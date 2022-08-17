@extends('layouts.theme.master')
@section('title')
    List User {{ $roles->name }}
@endsection

@section('button-header')
    <div class="btn-list">
        <a href="{{ route('users.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New User
        </a>
    </div>
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <hr class="mt-0 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    {!! $user->links() !!}
                </div>
                <form action="" method="GET">
                    <div class="row g-2">
                        <div class="col">
                            <input type="text" name="cari" class="form-control" placeholder="Cari Sekolah disini">
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
            <hr class="mt-2 mb-0">
            <div class="row mt-3">
                @forelse ($user as $data)
                    <div class="col-md-3">
                        <div class="card mt-3">
                            <div class="card-body p-4 text-center">
                                <span class="avatar avatar-xl mb-3 avatar-rounded"
                                    style="background-image: url({{ asset('dist/img/logo/') }})"></span>
                                <h3 class="m-0 mb-1">{{ $data->name }}</h3>
                                <div class="text-muted">{{ $data->email }}</div>
                                <div class="mt-3">
                                    <span class="badge bg-purple-lt">{{ $data->status }}</span>
                                </div>
                            </div>
                            <div class="d-flex mt-1 mb-0">
                                <a href=""
                                    class="card-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                        </path>
                                    </svg>
                                    View
                                </a>
                                <a class="card-btn text-danger"
                                    onclick="event.preventDefault(); document.getElementById('hapus-election-{{ $data->id }}').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-danger" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                    Delete
                                </a>
                                <form id="hapus-election-{{ $data->id }}"
                                    action="#"
                                    method="POST" class="d-none">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- paginate --}}
                @empty
                    @include('layouts.theme.empty')
                @endforelse
            </div>
        </div>
    </div>
@endsection
