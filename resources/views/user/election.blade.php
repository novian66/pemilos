@extends('layouts.theme.master')
@section('title')
    Kandidat
@endsection
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                    @if($message!='')
                    <div class="alert alert-warning">
                      {{$message}}
                    </div>
                    @endif
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row">
                            @forelse ($candidate as $item)
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body p-4 text-center">
                                            <span class="avatar avatar-xl mb-3 avatar-rounded"
                                                style="background-image: url({{ asset('dist/img/candidate/' . $item->poster) }})">
                                            </span>
                                            <h3 class="m-0 mb-1">{{ $item->nama }}</h3>
                                            <div class="text-muted">{!! $item->description !!}</div>
                                        </div>
                                        @if($is_open=='true')
                                        
                                        <div class="d-flex">
                                            <a href="javascript:void(0)"
                                                action="{{ route('user.vote', ['id' => $item->id, 'school_id' => $item->school_id, 'election_id' => $item->election_school_id]) }}"
                                                onclick="votePaslon(this)" class="card-btn text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-color-picker" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M11 7l6 6"></path>
                                                    <path
                                                        d="M4 16l11.7 -11.7a1 1 0 0 1 1.4 0l2.6 2.6a1 1 0 0 1 0 1.4l-11.7 11.7h-4v-4z">
                                                    </path>
                                                </svg>
                                                Vote
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @empty
                                @include('layouts.theme.empty')
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    function votePaslon(link) {
        Swal.fire({
                icon: 'warning',
                title: 'Yakin ingin memilih?',
                text: 'Anda tidak dapat mengubah pilihan anda!',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
                showCancelButton: true,
                dangerMode: true,
            })
            .then(result => {
                if (result['isConfirmed']) {
                    window.location = $(link).attr('action');
                }
            });
    }
</script>
