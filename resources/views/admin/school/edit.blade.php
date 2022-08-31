@extends('layouts.theme.master')
@section('title')
    Edit Sekolah : {{ $data->nama }}
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('school.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="row">
                                <div class="col-md-5">
                                    <img id="blah" src="{{ asset('dist/img/logo/' . $data->logo) }}"
                                        alt="logo school image" class="img-fluid">
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 ">
                                                <label class="form-label">Nama Sekolah</label>
                                                <div>
                                                    <input type="text"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        value="{{ $data->nama }}" name="nama">
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
                                                <label class="form-label">Nomor Telepon</label>
                                                <div>
                                                    <input type="number"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        value="{{ $data->phone }}" name="phone">
                                                    @error('phone')
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
                                                <input type="file"
                                                    class="form-control @error('image') is-invalid @enderror"
                                                    value="{{ old('') }}" id="imgInp" name="image">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 ">
                                                <label class="form-label">Email Sekolah</label>
                                                <div>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ $data->email }}" name="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat Sekolah</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" name="example-textarea-input"
                                            rows="2" placeholder="Content..">{{ $data->adress }}</textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label">Status Sekolah</div>
                                        <label class="form-check form-switch">
                                            @if ($data->status == 'active')
                                                <input class="form-check-input" type="checkbox" checked>
                                                <span class="form-check-label">Active</span>
                                            @else
                                                <input class="form-check-input" type="checkbox">
                                                <span class="form-check-label">Disable</span>
                                            @endif
                                        </label>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-secondary w-100">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
