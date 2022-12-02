@extends('layouts.theme.master')
@section('title')
    {{ $data->nama }}
@endsection

@section('button-header')
    <div class="d-flex">
        <a href="{{ route('school.export_user') }}" class="btn btn-warning shadow-sm d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3"></path>
            </svg>
            Export Excell
        </a>
        <button type="button" class="btn btn-info shadow-sm d-none d-sm-inline-block ms-3" data-bs-toggle="modal"
            data-bs-target="#modal-simple">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3"></path>
            </svg>
            Import User
        </button>
        <div class="dropdown ms-3">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Action
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="{{ route('group-school') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah Group
                    </a>
                </li>                
                <li>
                    <a class="dropdown-item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah Kegiatan
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah Siswa/i
                    </a>
                </li>
            </ul>
        </div>
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
                            <a href="{{ route('buat-election') }}" class="btn btn-secondary d-none d-sm-inline-block">
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
                            <div class="card card-sm p-2">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar me-3 rounded"
                                            style="background-image: url({{ asset('dist/img/logo/' . $data->logo) }})"></span>
                                        <div>
                                            <div>{{ $elec->title }}</div>
                                            <div class="text-muted">{{ $elec->deskripsi }}</div>
                                        </div>
                                        <div class="ms-auto mb-0">
                                            <a href="{{ route('quickcount') }}" class="text-muted">
                                                Token: {{ $elec->token }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <small>Progress Pemilu</small>
                                    <small>{{ $elec->vote->count() }}/{{ $jumlah }}</small>
                                </div>
                                @php
                                    $total = (int) (($elec->vote->count() / $jumlah) * 100);
                                @endphp
                                <div class="progress mb-1" style="height: 15px;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $total }}%;"
                                        aria-valuenow="{{ $total }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ $total }}%</div>
                                </div>
                                <div class="d-flex mt-1 mb-0">
                                    <a href="{{ route('lihat-election', $elec->id) }}" class="card-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
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
                                        action="{{ route('hapus-election', $elec->id) }}" method="POST" class="d-none">
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
                    <div class="card p-3 shadow-sm rounded">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Cari Nama</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Type User</label>
                                        <select class="form-select" aria-label="Default select example" name="type">
                                            <option value=""}}>All Type</option>
                                            <option value="siswa">Siswa / i</option>
                                            <option value="guru">Guru</option>
                                            <option value="karyawan">Karyawan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" aria-label="Default select example" name="jk">
                                            <option value=""}}>All Type</option>
                                            <option value="L">Laki Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="" class="form-label">action</label>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>JK</th>
                                        <th>NIS / NIP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $user_join)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user_join->user->name }}</td>
                                            <td>{{ $user_join->user->jenis_kelamin ?? 'empty' }}</td>
                                            <td>{{ $user_join->user->nisn }}</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-danger w-100 btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2"
                                                        width="15" height="15" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="4" y1="7" x2="20"
                                                            y2="7">
                                                        </line>
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17">
                                                        </line>
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17">
                                                        </line>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg>
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No User Join</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="mt-4">
                            {!! $user->links() !!}
                        </div>
                        <div class="mt-4">
                            <p>Jumlah User : {{ $jumlah }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- import --}}
    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('school.import_user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3 ">
                            <label class="form-label">Masukan File Excell</label>
                            <div>
                                <input type="file" class="form-control" name="berkas" aria-describedby="emailHelp"
                                    placeholder="Masukkan Token">
                            </div>
                            <input type="text" name="school" value="{{ $data->nama }}" hidden>
                        </div>
                        <div class="form-footer text-center">
                            <a href="{{ url('dist/excel/template_import_user.xlsx') }}" class="btn btn-warning">Unduh Sampel</a>
                            <button type="submit" class="btn btn-secondary ms-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
