@extends('layouts.auth')

@section('content')
    <div class="page-body">
        <div class="container-md text-center">
            <p class="fs-1 fw-bold">Selamat!</p>
            <p class="fs-3">Anda telah berpartisipasi dalam kegiatan:</p>
            <p class="fs-2">{{ $eventData->title }}</p>
            <p class="fs-3">Pada: {{ $date }} </p>
            <p class="fs-3">Anda memilih:</p>
            <p class="fs-1 fw-bold">{{ $candidateData->urutan }}</p>
        </div>
    </div>
@endsection
