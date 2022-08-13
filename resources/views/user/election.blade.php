@extends('layouts.theme.master')
@section('title')
    Kegiatan Sekolah
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                @forelse ($data as $item)
                    <div class="col-md-5">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-3 rounded"
                                        style="background-image: url({{ asset('dist/img/election/' . $item->image) }})">
                                    </span>
                                    <div>
                                        <div>{{ $item->title }}</div>
                                    <div class="text-muted">{{ $item->deskripsi }}</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="#" class="text-muted">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                                </path>
                                            </svg>
                                            467
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-1 mb-0">
                                <a href="" class="card-btn">
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
                                <a class="card-btn text-danger" onclick="event.preventDefault();">
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
                            </div>
                        </div>
                    </div>
                @empty
                    @include('layouts.theme.empty')
                @endforelse
            </div>
        </div>
    </div>
@endsection
