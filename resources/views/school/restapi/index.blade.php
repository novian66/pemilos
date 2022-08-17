@extends('layouts.theme.master')
@section('title')
    API Token
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        @if (empty($token))
                            <div class="card-body">
                                <h3 class="card-title">Request Token API</h3>
                                <hr class="mb-3 mt-0">
                                <form action="{{ route('request.api') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Apa alasan anda request api ?</label>
                                        <textarea class="form-control @error('kebutuhan') is-invalid @enderror" name="kebutuhan" rows="6"
                                            placeholder="Content.."></textarea>
                                        @error('kebutuhan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="card-text">
                                        <button type="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="card-body">
                                @if ($token->token == null)
                                    <div class="alert alert-danger" role="alert">
                                        Request Anda Sedang Kami Proses, Mohon Tunggu !
                                    </div>
                                @else
                                    <h3 class="card-title">Your Api Token</h3>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" readonly disabled value="{{$token->token}}"
                                            autocomplete="off">
                                        <label for="floating-password">Token Access</label>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
