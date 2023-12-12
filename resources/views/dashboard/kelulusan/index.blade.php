@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

  @if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

<div class="container">
  <div class="row justify-content-center">  
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Info Kelulusan</h5>
              <div class="mb-3">
              <form action="/tampil" method="post" class="d-inline">
                        @csrf
                        @method('put')
                        <button class="btn btn-success" type="submit">Tampilkan Pada Halaman Info</button>
                      </form>

                   <!-- Add another button here -->
              <form action="/tidak-tampil" method="post" class="d-inline">
                  @csrf
                  @method('put')
                  <button class="btn btn-danger" type="submit">Tidak Tampilkan</button>
              </form>       
              </div>
              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nisn</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($hasil_tes as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->peserta->nama }}</td>
                    <td>{{ $data->peserta->nisn }}</td>
                    <td>{{ $data->peserta->asal_sekolah }}</td>
                    @if($data->keterangan > 60)
                    <td><b class="text-success">Lulus</b></td>
                    @else
                    <td><b class="text-danger">Tidak Lulus</b></td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Bordered Table -->

            </main>
@endsection

