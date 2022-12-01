@extends('layouts.theme.master')
@section('title')
    Data Group
@endsection
{{-- {{ dd($data) }} --}}
@section('content')
    <div class="page-body">
        <div class="container">
            
            <div class="row g-2 align-items-center">

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                  <div class="btn-list">
                    <a href="{{ route('create-group') }}" class="btn btn-primary d-none d-sm-inline-block">
                      Group Baru
                    </a>
                  </div>
                </div>
              </div>
              @if(session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message')}}
            </div>
            @endif

            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <table class="table table-responsive table-hover">
                                                <thead>
                                                <tr>
                                                    <td>Code</td>
                                                    <td>Name</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>

                                                @foreach ($data as $val)
                                                <tr>
                                                    <td><span class="badge {{ $val->status_color }}">{{ $val->status_name }}</span> {{ $val->code }}</td>
                                                    <td> {{ $val->name }}</td>
                                                    <td>
                                                        <a class="btn btn-primary" href="{{ route('edit-group',['school_group' => $val->id]) }}">Edit</a>
                                                    </td>
                                                    {{-- <td>Name</td> --}}
                                                </tr>
                                                @endforeach
                                            </table>
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
