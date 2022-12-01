@extends('layouts.theme.master')
@section('title')
    Tambah Data Group
@endsection

@section('content')
    <div class="page-body">
        <div class="container">
            
            <div class="row g-2 align-items-center">


            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('update-group',['school_group' => $school_group->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                      <div class="card-header">
                        <h3 class="card-title">Group</h3>
                      </div>
                      <div class="card-body">
                        <div class="mb-3 row">
                          <label class="col-3 col-form-label required">Kode Group</label>
                          <div class="col">
                            <input type="input" value="{{ old('code') ?? $school_group->code }}" name='code' class="form-control" required placeholder="Masukan Kode Group">
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-3 col-form-label required">Nama Group</label>
                          <div class="col">
                            <input type="input" value="{{ old('name') ?? $school_group->name }}" name='name' class="form-control" required placeholder="Masukan Nama Group">
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-3 col-form-label required">Status Group</label>
                          <div class="col">
                            <select class="form-control form-select" name="status">
                                <option value="1" {{(old('status')??$school_group->status)=='1'?'selected':''}}>Aktif</option>
                                <option value="0" {{(old('status')??$school_group->status)=='0'?'selected':''}}>Tidak Aktif</option>
                              </select>
                            </div>
                        </div>                        
                        
                     
                      </div>
                      <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
