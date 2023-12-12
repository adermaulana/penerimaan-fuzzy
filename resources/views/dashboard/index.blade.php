@extends('dashboard.layouts.main')


@section('container')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-15 col-xl-15">

              <div class="card info-card customers-card">   

                <div class="card-body">
                  <h5 class="card-title">Jumlah Peserta Yang Lulus</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6> {{ $lulus }} </h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
       <!-- Customers Card -->
       <div class="col-xxl-15 col-xl-15">

<div class="card info-card customers-card">   

  <div class="card-body">
    <h5 class="card-title">Jumlah Peserta Yang Tidak Lulus</h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-people"></i>
      </div>
      <div class="ps-3">
        <h6>{{ $tidak_lulus }}</h6>
      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->
             <!-- Customers Card -->
             <div class="col-xxl-15 col-xl-15">

<div class="card info-card customers-card">   

  <div class="card-body">
    <h5 class="card-title">Total Peserta</h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-people"></i>
      </div>
      <div class="ps-3">
        <h6>{{ $peserta }}</h6>
      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->

       

           


    


      </div>
    </section>

  </main>
  <!-- End #main -->

@endsection