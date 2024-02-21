@extends('layouts.main')

@section('container')

<div class="container" style="margin-top: 130px">
        <div class="row justify-content-center">
      <div class="col-lg-10"> 

      @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
       
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Input Jarak Rumah </h5>

            <!-- General Form Elements -->
            <form action="{{ route('jarak_rumah.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id_peserta">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_kabupaten" class="form-control">
                </div>
              </div>
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Kecamatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_kecamatan" class="form-control">
                  </div>
                  </div>
                  <form>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control">
                      </div>
                    </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jarak Rumah</label>
                        <div class="col-sm-10">
                          <select name="jarak_rumah" class="form-select" aria-label="Default select example">
                            <option selected>Pilih Jarak Rumah</option>
                            <option value="3">0 km - 5 km</option>
                            <option value="7">6 km - 10 km</option>
                            <option value="15">11 km keatas</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="text-center mb-5">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
      </div>
    </form>

      @endsection