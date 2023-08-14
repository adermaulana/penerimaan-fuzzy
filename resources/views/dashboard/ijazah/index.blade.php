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
              <h5 class="card-title">Nilai Ijazah</h5>
              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nilai Rata-Rata Ijazah</th>
                    <th scope="col">Foto Surat Keterangan Lulus</th>
                    <th scope="col">Tombol Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($ijazah as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->ijazah }}</td>
                    <td><img width="150" src="{{ asset('storage/' . $data->surat_lulus)  }}" alt=""></td>
                    <td>
                      <a class="btn btn-warning" href="/dashboard/ijazah/{{ $data->id }}/edit">Edit</a>
                      <form action="/dashboard/ijazah/{{ $data->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0 " onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><span data-feather="x-circle">Hapus</span></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Bordered Table -->

            </main>
@endsection