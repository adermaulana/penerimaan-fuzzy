@extends('layouts.main')

@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
  
  
  <div class="container">
      @if(session()->has('success'))
                  <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Welcome {{  auth('peserta')->user()->nama ?? auth()->user()->name ?? '' }} </h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Selamat Datang di Website Pendaftaran Siswa Baru Madrasah Aliyah (MA) Manuju Kab Gowa.</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="/register" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Daftar</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/sekolah.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>


  </section><!-- End Hero -->

       <!-- ======= Counts Section ======= -->
       <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
  
          <div class="row gy-4">
          <div class="container-fluid container-md d-flex align-items-center justify-content-between">
            
  
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="{{ $peserta }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Pendaftar</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Pendaftar Hari Ini</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Daya Tampung</p>
                </div>
              </div>
            </div>
  
        
          </div>
  
        </div>
      </section><!-- End Counts Section -->

@endsection