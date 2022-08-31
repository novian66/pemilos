@extends('layouts.theme.master')
@section('title')
    API Token Request
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Request Token API</h3>
                            <hr class="mb-3 mt-0">
                            <form action="{{ route('kpu.api.acc', $api->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $api->user->name }}" readonly
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Sekolah</label>
                                    <input type="text" class="form-control" value="{{ $api->school->nama }}" readonly
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Apa alasan anda request api ?</label>
                                    <textarea class="form-control" disabled readonly rows="6">{{ $api->kebutuhan }}</textarea>
                                </div>
                                <input type="text" hidden value="{{ $api->status == 'disable' ? 'active' : 'disable' }}"
                                    name="status">
                                <div class="card-text">
                                    <button type="submit"
                                        class="btn {{ $api->status == 'disable' ? 'btn-success' : 'btn-danger' }} w-100">
                                        @if ($api->status == 'disable')
                                            Aprove
                                        @else
                                            Disable
                                        @endif
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
