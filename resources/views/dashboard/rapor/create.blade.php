@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">


    
    <section class="section dashboard">
      <div class="row">
    
        <!-- columns -->
        <div class="col-lg-12">
          <div class="row">
    
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
    
                <div class="card-body">
                  <h5 class="card-title">Tambah Nilai Rapor</h5>
                  <div class="container">
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
    </div>
    <div class="pull-right">
    <a class="btn btn-danger" href="/dashboard/rapor" enctype="multipart/form-data"> Batal</a>
    </div>
    </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
    <form action="/dashboard/rapor" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <h6>Nama</h6>
    <select class="form-select" name="id_peserta">
            @foreach ($nama as $data)
              <option value="{{ $data->id }}" selected> {{ $data->nama }} </option>
            @endforeach
    </select>
    @error('id_peserta')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group mt-2">
    <h6>Semester 1</h6>
    <input type="number" name="semester_1" value="{{ old('semester_1') }}" class="form-control" >
    @error('semester_1')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group mt-2">
    <h6>Semester 2</h6>
    <input type="number" name="semester_2" value="{{ old('semester_2') }}" class="form-control" >
    @error('semester_2')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group mt-2">
    <h6>Semester 3</h6>
    <input type="number" name="semester_3" value="{{ old('semester_3') }}" class="form-control" >
    @error('semester_3')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group mt-2">
    <h6>Semester 4</h6>
    <input type="number" name="semester_4" value="{{ old('semester_4') }}" class="form-control" >
    @error('semester_4')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group mt-2">
    <h6>Semester 5</h6>
    <input type="number" name="semester_5" value="{{ old('semester_5') }}" class="form-control" >
    @error('semester_5')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group mt-2 mb-3">
    <h6>Semester 6</h6>
    <input type="number" name="semester_6" value="{{ old('semester_6') }}" class="form-control" >
    @error('semester_6')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group mt-2">
      <h6>Foto Rapor</h6>
      <input type="file" name="foto_rapor" value="{{ old('foto_rapor') }}" class="form-control" >
      @error('foto_rapor')
      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
      </div>
      </div>
    <div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <button style="margin-left:-15px;"  type="submit" class="btn btn-primary col-6 me-1">Submit</button>
    </div>
    </div>
    </form>
    </div>
        
    
                </div>
    
              </div>
            </div><!-- End Recent Sales -->
    
          </div>
        </div><!-- End columns -->
    
      </div>
    </section>
    
    </main><!-- End #main -->

@endsection