@extends('layouts.theme.master')
@section('title')
    Manajemen Sekolah Anda
@endsection

@if (!empty($school))
    @section('button-header')
        <div class="btn-list">
            <a onclick="event.preventDefault(); document.getElementById('hapus-school').submit();"
                class="btn btn-danger d-none d-sm-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="4" y1="7" x2="20" y2="7"></line>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
                Hapus Sekolah
            </a>
            <form id="hapus-school" action="{{ route('hapus-sekolah') }}" method="POST" class="d-none">
                @csrf @method('DELETE')
            </form>
        </div>
    @endsection
@endif

@section('content')
    <div class="page-body">
        @if (empty($school))
            @include('school.layouts.emptyschool')
        @else
            @include('school.layouts.data')
        @endif
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
