@extends('layouts.theme.master')
@section('title')
    {{ $data->nama }}
@endsection

@section('button-header')
    <div class="btn-list">
        <a href="{{ route('school.edit', $data->id) }}" class="btn btn-warning d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
            </svg>
            Edit Sekolah
        </a>
        <a onclick="event.preventDefault(); document.getElementById('hapus-school').submit();"
            class="btn btn-danger d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="4" y1="7" x2="20" y2="7"></line>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
            </svg>
            Delete
        </a>
        <form id="hapus-school" action="{{ route('school.destroy', $data->id) }}" method="POST" class="d-none">
            @csrf @method('DELETE')
        </form>
    </div>
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-5">
                    <div class="card p-2">
                        <div class="d-flex justify-content-between">
                            <h2 class="page-title text-muted">
                                Kegiatan Pemilu
                            </h2>
                            <a href="{{ route('election.create', $data->id) }}"
                                class="btn btn-secondary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Tambah Kegiatan
                            </a>
                        </div>
                    </div>
                    @forelse ($election as $elec)
                        <div class="mt-3">
                            <div class="card card-sm mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar me-3 rounded"
                                            style="background-image: url({{ asset('dist/img/logo/' . $data->logo) }})"></span>
                                        <div>
                                            <div>{{ $elec->title }}</div>
                                            <div class="text-muted">{{ $elec->deskripsi }}</div>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="{{ route('quickcount') }}" class="text-muted">
                                                Token: {{ $elec->token }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-1 mb-0">
                                    <a href="{{ route('election.view', ['id' => $data->id, 'election_id' => $elec->id]) }}"
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
                                        Lihat Kegiatan
                                    </a>
                                    <a class="card-btn text-danger"
                                        onclick="event.preventDefault(); document.getElementById('hapus-election-{{ $elec->id }}').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-danger"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                        Hapus
                                    </a>
                                    <form id="hapus-election-{{ $elec->id }}"
                                        action="{{ route('election.destroy', ['id' => $data->id, 'election_id' => $elec->id]) }}"
                                        method="POST" class="d-none">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="mt-3">
                            @include('layouts.theme.empty')
                        </div>
                    @endforelse
                </div>
                <div class="col-md-7">
                    <div class="card p-2">
                        <div class="d-flex justify-content-between">
                            <h2 class="page-title text-muted">
                                Jumlah Siswa/i: {{ $totalUser }}
                            </h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @forelse ($user as $user_join)
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body p-4 text-center">
                                        <span class="avatar avatar-xl mb-3 avatar-rounded"
                                            style="background-image: url(./static/avatars/000m.jpg)"></span>
                                        <h3 class="m-0 mb-1">{{ $user_join->user->name }}</h3>
                                        <div class="text-muted">Email: {{ $user_join->user->email }}</div>
                                        <div class="text-muted">NISN : {{ $user_join->user->nisn }}</div>
                                        <div class="text-muted">Token: {{ $user_join->user->token }}</div>
                                        <div class="mt-3">
                                            <span class="badge bg-purple-lt">{{ $user_join->status }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <a href="#" class="card-btn text-danger">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-danger"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="7" x2="20" y2="7">
                                                </line>
                                                <line x1="10" y1="11" x2="10" y2="17">
                                                </line>
                                                <line x1="14" y1="11" x2="14" y2="17">
                                                </line>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                            Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @empty
                            @include('layouts.theme.empty')
                        @endforelse
                    </div>
                    {{-- paginate --}}
                    <div class="mt-4">
                        {!! $user->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal modal-blur fade" id="add-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi beatae delectus deleniti
                    dolorem eveniet facere fuga iste nemo nesciunt nihil odio perspiciatis, quia quis reprehenderit sit
                    tempora totam unde.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="add-event" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi beatae delectus deleniti
                    dolorem eveniet facere fuga iste nemo nesciunt nihil odio perspiciatis, quia quis reprehenderit sit
                    tempora totam unde.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
