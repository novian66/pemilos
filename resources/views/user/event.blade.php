@extends('layouts.theme.master')
@section('title')
    Kegiatan Sekolah
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <span class="avatar me-3 rounded"
                                    style="background-image: url({{ asset('dist/img/election/' . $event->image) }})">
                                </span>
                                <div>
                                    <div>{{ $event->title }}</div>
                                    <div class="text-muted">{{ $event->deskripsi }}</div>
                                </div>
                                <div class="ms-auto">
                                    <p class="text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar-event" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="5" width="16" height="16"
                                                rx="2"></rect>
                                            <line x1="16" y1="3" x2="16" y2="7"></line>
                                            <line x1="8" y1="3" x2="8" y2="7"></line>
                                            <line x1="4" y1="11" x2="20" y2="11"></line>
                                            <rect x="8" y="15" width="2" height="2"></rect>
                                        </svg>
                                        Mulai : {{ $event->start }}
                                    </p>
                                    <p class="text-muted m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar-event" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="5" width="16" height="16"
                                                rx="2"></rect>
                                            <line x1="16" y1="3" x2="16" y2="7"></line>
                                            <line x1="8" y1="3" x2="8" y2="7"></line>
                                            <line x1="4" y1="11" x2="20" y2="11"></line>
                                            <rect x="8" y="15" width="2" height="2"></rect>
                                        </svg>
                                        Selesai : {{ $event->end }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-1 mb-0">
                            <a href="{{ route('user.election', $event->id) }}" class="card-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="2"></circle>
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                    </path>
                                </svg>
                                Lihat Kandidat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
