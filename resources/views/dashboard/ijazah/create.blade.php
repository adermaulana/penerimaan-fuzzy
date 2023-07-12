@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">


<div class="container">
  <div class="row justify-content-center">  
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Nilai Iazah</h5>
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
                <form action="/dashboard/ijazah" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <h6>Nilai Rata-Rata Ijazah</h6>
                    <input type="number" name="ijazah" value="{{ old('ijazah') }}" class="form-control" >
                    @error('ijazah')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group mt-2">
                    <h6>Foto KK</h6>
                    <input type="file" name="foto_kk" value="{{ old('foto_kk') }}" class="form-control" id="formFile" >
                    @error('foto_kk')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group mt-2 mb-3">
                    <h6>Surat Keterangan Lulus</h6>
                    <input type="file" name="surat_lulus" value="{{ old('surat_lulus') }}" class="form-control"id="formFile" >
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