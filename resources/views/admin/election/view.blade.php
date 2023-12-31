@extends('layouts.theme.master')
@section('title')
    {{ $data->title }}
@endsection

@section('button-header')
    <div class="btn-list">
        <a onclick="event.preventDefault(); document.getElementById('hapus-election').submit();"
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
        <form id="hapus-election"
            action="{{ route('election.destroy', ['id' => $school->id, 'election_id' => $data->id]) }}" method="POST"
            class="d-none">
            @csrf @method('DELETE')
        </form>
    </div>
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-5">
                    <div class="card p-2 shadow-sm rounded">
                        <div class="d-flex justify-content-between">
                            <h2 class="page-title text-muted">
                                List Kandidat
                            </h2>
                            <a href="{{ route('candidate.create', ['id' => $school->id, 'election_id' => $data->id]) }}"
                                class="btn btn-secondary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Tambah Kandidat
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @foreach ($candidate as $paslon)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-4 text-center">
                                        <span class="avatar avatar-xl mb-3 avatar-rounded"
                                            style="background-image: url({{ asset('dist/img/candidate/' . $paslon->poster) }})"></span>
                                        <h3 class="m-0 mb-1">{{ $paslon->nama }}</h3>
                                        <div class="text-muted">Urutan Ke : {{ $paslon->urutan }}</div>
                                        <div class="mt-3">
                                            {{ $paslon->description }}
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
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card p-2 shadow-sm rounded">
                        <form action="{{ route('election.update', ['id' => $school->id, 'election_id' => $data->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Nama Kegiatan</label>
                                        <div>
                                            <input type="text"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ $data->title }}" name="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Tanggal Mulai</label>
                                        <div>
                                            <input type="date" min="{{ date('Y-m-d') }}"
                                                class="form-control @error('start') is-invalid @enderror"
                                                value="{{ $data->start }}" name="start" id="datetime">
                                            @error('start')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-label">Logo Sekolah</div>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="imgInp" name="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Tanggal Selesai</label>
                                        <div>
                                            <input type="date" min="{{ date('Y-m-d') }}"
                                                class="form-control @error('end') is-invalid @enderror"
                                                value="{{ $data->end }}" name="end" id="datetime">
                                            @error('end')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Kegiatan</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                    name="example-textarea-input" rows="2" placeholder="Content..">{{ $data->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Token Kegiatan</label>
                                <p>{{ $data->token }}</p>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Status Kegiatan</div>
                                <label class="form-check form-switch">
                                    @if ($data->status == 'enable')
                                        <input class="form-check-input" type="checkbox" name="status" checked>
                                        <span class="form-check-label">Enable</span>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="status">
                                        <span class="form-check-label">Disable</span>
                                    @endif
                                </label>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-secondary w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
