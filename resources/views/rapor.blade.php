@extends('layouts.main')

@section('container')

<div class="container" style="margin-top: 130px">
<div class="row justify-content-center">
      <div class="col-sm-7"> 
       
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Input Nilai Raport </h5>

            

            <!-- General Form Elements -->
            <form action="{{ route('rapor.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id_peserta">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-6 col-form-label">Nilai Rata-Rata Semester 1</label>
                <div class="col-sm-5">
                  <input type="text" name="semester_1" class="form-control">
                </div>
              </div>
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-6 col-form-label">Nilai Rata-Rata Semester 2</label>
                  <div class="col-sm-5">
                    <input type="text" name="semester_2" class="form-control">
                  </div>
                </div>
                <form>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-6 col-form-label">Nilai Rata-Rata Semester 3</label>
                      <div class="col-sm-5">
                        <input type="text" name="semester_3" class="form-control">
                      </div>
                    </div>
                    <form>
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-6 col-form-label">Nilai Rata-Rata Semester 4</label>
                          <div class="col-sm-5">
                            <input type="text" name="semester_4" class="form-control">
                          </div>
                        </div>
                        <form>
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-6 col-form-label">Nilai Rata-Rata Semester 5</label>
                              <div class="col-sm-5">
                                <input type="text" name="semester_5" class="form-control">
                              </div>
                            </div>
                            <form>
                                <div class="row mb-3">
                                  <label for="inputText" class="col-sm-6 col-form-label">Nilai Rata-Rata Semester 6</label>
                                  <div class="col-sm-5">
                                    <input type="text" name="semester_6" class="form-control">
                                  </div>    
                                </div>
                                <form>
                                    <div class="row mb-3">
                                      <label for="inputNumber" class="col-sm-6 col-form-label">Upload Foto Raport</label>
                                      <div class="col-sm-5">
                                        <input class="form-control" name="foto_rapor" type="file" id="formFile">
                                    </div>    
                                  </div>
                                 
                  
                            </div> 
                            <div class="text-center mb-3">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
</div>  
      </div>
    </form>
      @endsection