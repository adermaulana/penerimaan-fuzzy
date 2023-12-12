@extends('layouts.main')

@section('container')


<div class="container" style="margin-top: 130px">
        <div class="row justify-content-center">
      <div class="col-lg-10"> 
       
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Input Nilai Ijazah</h5>

            <!-- General Form Elements -->
            <form action="{{ route('ijazah.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id_peserta">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-5 col-form-label">Nilai Rata-Rata Ijazah</label>
                <div class="col-sm-6">
                  <input type="text" name="ijazah" class="form-control">
                </div>
              </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-5 col-form-label">Upload Surat Keterangan Lulus</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="surat_lulus" id="formFile">
                  </div>
                </div>
</div>


                        <div class="text-center mb-5">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </div>
                    
                        
      </div>
    </form>


      @endsection