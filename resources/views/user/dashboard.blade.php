@extends('layouts.theme.master')
@section('title')
    Dashboard User
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
            Join School
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
                                        <a href="{{ route('user.school') }}" class="card-btn">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="3" y="5" width="18" height="14"
                                                    rx="2"></rect>
                                                <polyline points="3 7 12 13 21 7"></polyline>
                                            </svg>
                                            View
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
                    <div class="card p-3 shadow-sm rounded h-100">
                        <h3 class="mb-0 text-center">Change Profile</h3>
                        <hr class="mt-3 mb-3">
                        <form action="{{ route('user.editProfile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Full Name</label>
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
                                        <label class="form-label">Email Adress</label>
                                        <div>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                value="{{ auth()->user()->email }}" name="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
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
                                <button type="submit" class="btn btn-secondary w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <label class="form-label">Masukan Token Sekolah</label>
                            <div>
                                <input type="text" class="form-control" name="token" aria-describedby="emailHelp"
                                    placeholder="Enter Your Token">
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
