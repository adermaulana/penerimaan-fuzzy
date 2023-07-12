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
                    <h5 class="card-title">Edit Data Peserta</h5>
                    <div class="container">
      <div class="row">
      <div class="col-lg-12 margin-tb">
      <div class="pull-left">
      </div>
    <div class="pull-right">
    <a class="btn btn-danger" href="/dashboard/data_siswa" enctype="multipart/form-data"> Batal</a>
    </div>
    </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
    <form action="/dashboard/data_siswa/{{ $datasiswa->id }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
    @csrf
    <div class="row mt-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <div class="row mt-3">
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <h6>Nama</h6>
            <select class="form-select" name="nama">
                    @foreach ($nama as $data)
                      <option value="{{ $data->nama }} " selected> {{ $data->nama }} </option>
                    @endforeach
            </select>
            @error('nama')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Nisn</h6>
            <input type="number" name="nisn" value="{{ old('nisn') }}" class="form-control" >
            @error('nisn')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Jenis Kelamin</h6>
            <select class="form-select" name="jarak_rumah">
            <option selected>Pilih Jenis Kelamin</option>
            <option value="1">Laki-Laki</option>
            <option value="2">Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Tempat Lahir</h6>
            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control" >
            @error('tempat_lahir')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Tanggal Lahir</h6>
            <input type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control" >
            @error('tanggal_lahir')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Asal Sekolah</h6>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-control" >
            @error('asal_sekolah')
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