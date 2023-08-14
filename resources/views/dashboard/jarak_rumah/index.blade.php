@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

<div class="container">
  <div class="row justify-content-center">  
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Jarak Rumah</h5>
              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kabupaten</th>
                    <th scope="col">Nama Kecamatan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jarak Rumah</th>
                    <th scope="col">Foto KK</th>
                    <th scope="col">Tombol Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($jarakrumah as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kabupaten }}</td>
                    <td>{{ $data->nama_kecamatan }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->jarak_rumah }}</td>
                    <td><img width="150" src="{{ asset('storage/' . $data->foto_kk)  }}" alt=""></td>
                    <td>
                      <a class="btn btn-warning" href="/dashboard/jarak_rumah/{{ $data->id }}/edit">Edit</a>
                      <form action="/dashboard/jarak_rumah/{{ $data->id }}" method="post" class="d-inline">
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