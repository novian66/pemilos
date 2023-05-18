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

                  </div>
                </div>
              </div>


            <div class="row">



                <div class="col-md-12">
                    <form class="card" action="{{ route('school.store-user-excel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <textarea style="display:none" name="data_json">{{ $data_json }}</textarea>
                      <div class="card-header">
                        <h3 class="card-title">Group</h3>
                      </div>
                      <div class="card-body">
                        @if($is_valid=='false')
                        <div class="alert alert-warning">
                          Data Tidak Valid Untuk Import
                        </div>
                        @endif
                        @if($is_valid=='true')
                        <div class="alert alert-success">
                          Data Sudah Valid Untuk Import
                          <button type="input" class="btn btn-success">Import</button>
                        </div>
                        @endif
                        <table class="table table-responsive table-hover">
                            <thead>
                            <tr>
                                <td>Row</td>
                                <td>Domain</td>
                                <td>User Type</td>
                                <td>User Group</td>
                                <td>Number ID</td>
                                <td>Name</td>
                                <td>Gendre</td>
                                <td>birthday</td>
                            </tr>
                        </thead>

                            @foreach ($data as $val)
                            <tr>
                                <td>{{ $val['number'] }}</td>
                                {{-- <td><input class="form-control" readonly name='data[{{$val['number']}}][domain]' value="{{ $val['domain'] }}" ></td>
                                <td><span class="badge {{ $val['is_user_type_available_status_color'] }}">{{ $val['is_user_type_available_status_name'] }}</span> <input class="form-control" readonly name='data[{{$val['number']}}][user_type]' value="{{ $val['user_type'] }}" ></td>
                                <td><span class="badge {{ $val['is_user_group_available_status_color'] }}">{{ $val['is_user_group_available_status_name'] }}</span><input class="form-control" readonly name='data[{{$val['number']}}][user_group]' value="{{ $val['user_group'] }}" ></td>
                                <td><span class="badge {{ $val['is_not_duplicate_status_color'] }}">{{ $val['is_not_duplicate_status_name'] }}</span><input class="form-control" readonly name='data[{{$val['number']}}][number_id]' value="{{ $val['number_id'] }}" ></td>
                                <td><input class="form-control" readonly name='data[{{$val['number']}}][name]' value="{{ $val['name'] }}" ></td>
                                <td><span class="badge {{ $val['is_gendre_available_status_color'] }}">{{ $val['is_gendre_available_status_name'] }}</span><input class="form-control" readonly name='data[{{$val['number']}}][gendre]' value="{{ $val['gendre'] }}" ></td> --}}
                                <td>{{ $val['domain'] }}</td>
                                <td><span class="badge {{ $val['is_user_type_available_status_color'] }}">{{ $val['is_user_type_available_status_name'] }}</span> {{ $val['user_type'] }}</td>
                                <td><span class="badge {{ $val['is_user_group_available_status_color'] }}">{{ $val['is_user_group_available_status_name'] }}</span>{{ $val['user_group'] }}</td>
                                <td><span class="badge {{ $val['is_not_duplicate_status_color'] }}">{{ $val['is_not_duplicate_status_name'] }}</span>{{ $val['number_id'] }}</td>
                                <td>{{ $val['name'] }}</td>
                                <td><span class="badge {{ $val['is_gendre_available_status_color'] }}">{{ $val['is_gendre_available_status_name'] }}</span>{{ $val['gendre'] }}</td>
                                <td><span class="badge {{ $val['is_birthday_format_status_color'] }}">{{ $val['is_birthday_format_status_name'] }}</span>{{ $val['birthday'] }}</td>
                            
                            </tr>
                            @endforeach
                        </table>
                     
                      </div>
                      <div class="card-footer text-end">

                      </div>
                    </form>
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
