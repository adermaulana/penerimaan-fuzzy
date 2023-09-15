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
    <a class="btn btn-danger" href="/dashboard/ijazah" enctype="multipart/form-data"> Batal</a>
    </div>
    </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
    <form action="/dashboard/ijazah/{{ $ijazah->id }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
    @csrf
    <div class="row mt-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <h6>Nama</h6>
    <select class="form-select" name="id_peserta">
            @foreach ($nama as $data)
              <option value="{{ $data->nama }} " selected> {{ $data->nama }} </option>
            @endforeach
    </select>
    @error('id_peserta')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group mt-2">
        <h6>Nilai Rata-Rata Ijazah</h6>
        <input type="number" name="ijazah" value="{{ old('ijazah', $ijazah->ijazah)  }}" class="form-control" >
        @error('ijazah')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group mt-2 mb-3">
        <h6>Surat Keterangan Lulus</h6>
        <input type="file" name="surat_lulus" value="{{ old('surat_lulus', $ijazah->surat_lulus) }}" class="form-control" >
        @error('surat_lulus')
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