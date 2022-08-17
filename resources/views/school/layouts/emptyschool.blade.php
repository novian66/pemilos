<div class="container-xl">
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <form action="{{ route('daftar-sekolah') }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="form-label">Name School</label>
                                        <div>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama') }}" name="nama">
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
                                        <label class="form-label">Phone School</label>
                                        <div>
                                            <input type="number"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') }}" name="phone">
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
                                        <div class="form-label">Upload Logo School</div>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
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
                                        <label class="form-label">E Mail School</label>
                                        <div>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" name="email">
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
                                <label class="form-label">Address School</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" name="example-textarea-input"
                                    rows="2" placeholder="Content..">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Status School</div>
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