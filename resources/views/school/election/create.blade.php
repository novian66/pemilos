@extends('layouts.theme.master')
@section('title')
    Add New Election
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('simpan-election') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <img id="blah" src="{{ asset('dist/img/noimage.png') }}" alt="logo school image"
                                        class="img-fluid">
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 ">
                                                <label class="form-label">Title Election</label>
                                                <div>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        value="{{ old('title') }}" name="title">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 ">
                                                <label class="form-label">Start Election</label>
                                                <div>
                                                    <input type="date" min="{{date('Y-m-d')}}"
                                                        class="form-control @error('start') is-invalid @enderror"
                                                        value="{{ old('start') }}" name="start" id="datetime">
                                                    @error('start')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="form-label">Upload Logo School</div>
                                                <input type="file"
                                                    class="form-control @error('image') is-invalid @enderror" id="imgInp"
                                                    name="image">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 ">
                                                <label class="form-label">Finish Election</label>
                                                <div>
                                                    <input type="date" min="{{date('Y-m-d')}}"
                                                        class="form-control @error('end') is-invalid @enderror"
                                                        value="{{ old('end') }}" name="end" id="datetime">
                                                    @error('end')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Election</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" name="example-textarea-input"
                                            rows="2" placeholder="Content..">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label">Status Election</div>
                                        <label class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status">
                                            <span class="form-check-label">Active</span>
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

@section('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript">
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        // $(function() {
        //     $('#datetime').datetimepicker();
        // });
    </script>
@endsection
