@extends('layouts.main')

@section('container')

<main id="main" class="main">

<div class="container" style="margin-top: 130px">

        <div class="row justify-content-center">
      <div class="col-lg-10"> 
       
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Siswa</h5>

            <!-- General Form Elements -->
            <form action="/data-siswa" method="POST">
              @csrf
              @method('put')
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nisn</label>
                  <div class="col-sm-10">
                    <input name="nisn" type="text" class="form-control">
                  </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                  </div>
                  </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-10">
                        <input name="tempat_lahir" type="text" class="form-control">
                      </div>
                      </div>
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <input name="tanggal_lahir" type="date" class="form-control">
                    </div>
                  </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Asal Sekolah</label>
                      <div class="col-sm-10">
                        <input name="asal_sekolah" type="text" class="form-control">
                      </div>
                      </div>
</div>
                      <div class="text-center mb-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
      </div>
</section>
    </form>

  </main><!-- End #main -->

      @endsection