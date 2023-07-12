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
                    <h5 class="card-title">Edit Nilai Ijazah</h5>
                    <div class="container">
      <div class="row">
      <div class="col-lg-12 margin-tb">
      <div class="pull-left">
      </div>
    <div class="pull-right">
    <a class="btn btn-danger" href="/dashboard/jarak_rumah" enctype="multipart/form-data"> Batal</a>
    </div>
    </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
    <form action="/dashboard/jarak_rumah/{{ $jarakrumah->id }}" method="POST" enctype="multipart/form-data">
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
            <h6>Nama Kabupaten</h6>
            <input type="text" name="nama_kabupaten" value="{{ old('nama_kabupaten', $jarakrumah->nama_kabupaten) }}" class="form-control" >
            @error('nama_kabupaten')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Nama Kecamatan</h6>
            <input type="text" name="nama_kecamatan" value="{{ old('nama_kecamatan', $jarakrumah->nama_kecamatan) }}" class="form-control" >
            @error('nama_kecamatan')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2">
            <h6>Alamat</h6>
            <input type="text" name="alamat" value="{{ old('alamat', $jarakrumah->alamat) }}" class="form-control" >
            @error('alamat')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group mt-2 mb-3">
            <h6>Jarak Rumah</h6>
            <select class="form-select" name="jarak_rumah" value="{{ old('jarak_rumah', $jarakrumah->jarak_rumah) }}" >
                <option selected>Pilih Jarak Rumah</option>
                <option value="0 km - 3 km">0 km - 3 km</option>
                <option value="4 km - 6 km">4 km - 6 km</option>
                <option value="7 km - 10 km">7 km - 10 km</option>
              </select>
            @error('jarak_rumah')
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