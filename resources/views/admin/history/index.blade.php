@extends('layouts.theme.master')
@section('title')
    History All Election School
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                @forelse ($data as $election)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <img src="{{ asset('dist/img/logo/' . $election->school->logo)}}"
                                            alt="Logo Sekolah" class="rounded">
                                    </div>
                                    <div class="col">
                                        <h3 class="card-title mb-1">
                                            {{ $election->title }}
                                        </h3>
                                        <div class="text-muted">
                                            <p class="mb-0">Sekolah {{ $election->school->nama }}</p>
                                            <p>Tanggal Kegiatan {{ $election->start }} - {{ $election->end }}</p>
                                        </div>
                                        <div class="mt-3">
                                            <div class="row g-2 align-items-center">
                                                <div class="col-auto">
                                                    25%
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar" style="width: 25%" role="progressbar"
                                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                            aria-label="25% Complete">
                                                            <span class="visually-hidden">25% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center">
                            @include('layouts.theme.empty')
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
