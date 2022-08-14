@extends('layouts.theme.master')
@section('title')
    School Management
@endsection

@section('button-header')
    <div class="btn-list">
        <a href="{{ route('school.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add School
        </a>
        <button type="button" class="btn btn-warning d-none d-sm-inline-block" data-bs-toggle="modal"
            data-bs-target="#modal-simple">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                <path d="M8 11h8v7h-8z"></path>
                <path d="M8 15h8"></path>
                <path d="M11 11v7"></path>
            </svg>
            Import Excell
        </button>
    </div>
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <hr class="mt-0 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    {!! $data->links() !!}
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
                @forelse ($data as $school)
                    <div class="col-md-3">
                        <div class="card mt-3">
                            <div class="card-body p-4 text-center">
                                <span class="avatar avatar-xl mb-3 avatar-rounded"
                                    style="background-image: url({{ asset('dist/img/logo/' . $school->logo) }})"></span>
                                <h3 class="m-0 mb-1">{{ $school->nama }}</h3>
                                <div class="text-muted">{{ $school->email }}</div>
                                <div class="mt-3">
                                    <span class="badge bg-purple-lt">{{ $school->status }}</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="{{ route('school.view', $school->id) }}" class="card-btn">
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


    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('school.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-label">Upload File </div>
                            <input type="file" class="form-control" value="{{ old('') }}" id="imgInp"
                                name="sampel">
                            <small class="mt-2">File Yang diterima hanya Csv dan Xlsx</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('dist/excell/schools.xlsx') }}" class="btn me-auto" data-bs-dismiss="modal">Get
                            Sample</a>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
