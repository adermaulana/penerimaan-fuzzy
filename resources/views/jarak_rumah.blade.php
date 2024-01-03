@extends('layouts.main')

@section('container')

<div class="container" style="margin-top: 130px">
        <div class="row justify-content-center">
      <div class="col-lg-10"> 
       
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
                            <option value="0 km - 3 km">0 km - 3 km</option>
                            <option value="4 km - 6 km">4 km - 6 km</option>
                            <option value="7 km - 10 km">7 km - 10 km</option>
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