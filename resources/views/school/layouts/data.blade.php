<div class="container-xl">
    <div class="row row-card">
        <div class="col-md-5">
            <div class="card">
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
                    <a href="{{ route('election-school') }}" class="card-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
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
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('update-sekolah') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3 ">
                                        <label class="form-label">Name School</label>
                                        <div>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ $school->nama }}" name="nama">
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
                                                value="{{ $school->phone }}" name="phone">
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
                                                value="{{ $school->email }}" name="email">
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
                                    rows="2" placeholder="Content..">{{ $school->adress }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Status School</div>
                                <label class="form-check form-switch">
                                    @if ($school->status == 'active')
                                        <input class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">Active</span>
                                    @else
                                        <input class="form-check-input" type="checkbox">
                                        <span class="form-check-label">Disable</span>
                                    @endif
                                </label>
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
</div>
