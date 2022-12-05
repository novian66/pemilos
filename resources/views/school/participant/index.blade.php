@extends('layouts.theme.master')
@section('title')
    Tingkat Partisipasi {{$election->title}}
@endsection
{{-- {{ dd($data) }} --}}
@section('content')
    <div class="page-body">
        <div class="container">
            
            <div class="row g-2 align-items-center">

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                  <div class="btn-list">

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
                                                    <td>Group</td>
                                                    <td>Total</td>
                                                    <td>Voting</td>
                                                    <td>Not Voting</td>
                                                </tr>
                                            </thead>

                                                @foreach ($data['group'] as $key=>$val)
                                                <tr>
                                                    <td> {{ $key }}</td>
                                                    <td> {{ $val['total'] }}</td>
                                                    <td> {{ $val['voting'] }} ({{ round((($val['voting']/$val['total'])*100),3) }}%)</td>
                                                    <td> {{ $val['not_voting'] }}</td>
                                                </tr>
                                                @endforeach
                                            <thead>
                                                <tr style="background-color:aliceblue">
                                                    <td>Semua Group</td>
                                                    <td> {{ $data['all']['total'] }}</td>
                                                    <td> {{ $data['all']['voting'] }} ({{ round((($data['all']['voting']/$data['all']['total'])*100),3) }}%)</td>
                                                    <td> {{ $data['all']['not_voting'] }}</td>
                                                </tr>
                                            </thead>
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
