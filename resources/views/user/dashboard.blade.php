@extends('layouts.theme.master')
@section('title')
    Dashboard Pengguna
@endsection

@section('button-header')
    <div class="btn-list">
        <button type="button" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
            data-bs-target="#modal-simple">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Gabung Sekolah
        </button>
    </div>
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                @forelse ($school as $item)
                    <div class="col-md-5">
                        <div class="row row-card h-100">
                            <div class="col-md-12">
                                <div class="card h-100">
                                    <div class="card-body p-4 text-center">
                                        <span class="avatar avatar-xl mb-3 avatar-rounded"
                                            style="background-image: url({{ asset('dist/img/logo/' . $item->school->logo) }})"></span>
                                        <h3 class="m-0 mb-1"><a href="#">{{ $item->school->nama }}</a></h3>
                                        <div class="mt-3">
                                            <span
                                                class="badge {{ $item->status == 'enable' ? 'bg-green-lt' : 'bg-red-lt' }}">{{ $item->status }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <a href="#" class="card-btn" data-bs-toggle="modal"
                                            data-bs-target="
                                            
                                            <?php
                                            if($is_cannot_vote){
                                                echo '';
                                            }   
                                            else{
                                                echo '#modal-token';
                                            }
                                        ?>
                                            
                                            ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye me-2"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                                </path>
                                            </svg>
                                            <?php
                                                if($is_cannot_vote){
                                                    echo 'Ganti Password Untuk Dapat Memilih';
                                                }   
                                                else{
                                                    echo 'Lihat Kegiatan';
                                                }
                                            ?>
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    @include('layouts.theme.empty')
                @endforelse

                <div class="col-md-7">
                    <div class="card p-3 h-100">
                        <h3 class="mb-0 text-center">Ubah Profil</h3>
                        <hr class="mt-3 mb-3">
                        <form action="{{ route('user.editProfile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Nama Lengkap</label>
                                        <div>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ auth()->user()->name }}" name="nama">
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Email</label>
                                        <div>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                value="{{ auth()->user()->email }}" name="email" disabled>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Nomor Telepon</label>
                                        <div>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ auth()->user()->phone }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <div>
                                            <input type="date"
                                                class="form-control @error('birthday') is-invalid @enderror"
                                                name="birthday" value="{{ auth()->user()->birthday }}">
                                            @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <div>
                                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin">
                                                <option value="L"
                                                    {{ auth()->user()->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki -
                                                    laki
                                                </option>
                                                <option value="P"
                                                    {{ auth()->user()->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Password</label>
                                        <div>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-secondary w-100">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Join --}}
    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Join School</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.joinSchool') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3 ">
                            <label class="form-label">Masukkan Token Sekolah</label>
                            <div>
                                <input type="text" class="form-control" name="token" aria-describedby="emailHelp"
                                    placeholder="Masukkan Token">
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-secondary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Verifikasi --}}
    <div class="modal modal-blur fade" id="modal-token" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Akses Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.event') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3 ">
                            <label class="form-label">Masukkan Token Kegiatan</label>
                            <div>
                                <input type="text" class="form-control" name="token" aria-describedby="emailHelp"
                                    placeholder="Masukkan Token">
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-secondary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
