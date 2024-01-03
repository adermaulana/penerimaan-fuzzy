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
    <a class="btn btn-danger" href="/dashboard/peserta" enctype="multipart/form-data"> Batal</a>
    </div>
    </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
    <form action="/dashboard/peserta/{{ $datasiswa->id }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
    @csrf
    <div class="row mt-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <div class="row mt-3">
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <h6>Nama</h6>
            <input type="text" name="nama" value="{{ old('id_peserta',$datasiswa->nama) }}" class="form-control" >
            @error('nama')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Nisn</h6>
            <input type="text" name="nisn" value="{{ old('nisn',$datasiswa->nisn) }}" class="form-control" >
            @error('nisn')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Jenis Kelamin</h6>
            <select class="form-select" name="jenis_kelamin">
            <option selected>Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Tempat Lahir</h6>
            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir',$datasiswa->tempat_lahir) }}" class="form-control" >
            @error('tempat_lahir')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Tanggal Lahir</h6>
            <input type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir',$datasiswa->tanggal_lahir) }}" class="form-control" >
            @error('tanggal_lahir')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Asal Sekolah</h6>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah',$datasiswa->asal_sekolah) }}" class="form-control" >
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