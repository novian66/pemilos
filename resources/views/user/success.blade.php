@extends('layouts.auth')
@section('title')
    Berhasil Memilih
@endsection

@section('content')
    <div class="page-body">
        <div class="container-md text-center">
            <p class="fs-1 fw-bold">Selamat!</p>
            <p class="fs-3">Anda telah berpartisipasi dalam kegiatan:</p>
            <p class="fs-2 fw-bold">{{ $eventData->title }}</p>
            <p class="fs-3">Pada: <span class="fw-bold">{{ $date }}</span> </p>
            <p class="fs-3">Anda memilih:</p>
            <p class="fs-1 fw-bold">{{ $candidateData->urutan }}</p>
        </div>
    </div>
@endsection
