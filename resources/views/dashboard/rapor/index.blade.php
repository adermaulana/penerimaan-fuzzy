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
              <h5 class="card-title">Nilai Raport</h5>
              
              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Semester 1</th>
                    <th scope="col">Semester 2</th>
                    <th scope="col">Semester 3</th>
                    <th scope="col">Semester 4</th>
                    <th scope="col">Semester 5</th>
                    <th scope="col">Semester 6</th>
                    <th scope="col">Nilai Rata-Rata</th>
                    <th scope="col">Foto Rapor</th>
                    <th scope="col">Tombol Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($rapor as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->semester_1 }}</td>
                    <td>{{ $data->semester_2 }}</td>
                    <td>{{ $data->semester_3 }}</td>
                    <td>{{ $data->semester_4 }}</td>
                    <td>{{ $data->semester_5 }}</td>
                    <td>{{ $data->semester_6 }}</td>
                    <td> {{ ($data->semester_1 + $data->semester_2 + $data->semester_3 + $data->semester_4 + $data->semester_5 + $data->semester_6) / 6 }} </td>
                    <td><img width="150" src="{{ asset('storage/' . $data->foto_rapor)  }}" alt=""></td>
                    <td>
                      <a class="btn btn-warning" href="/dashboard/rapor/{{ $data->id }}/edit">Edit</a>
                      <form action="/dashboard/rapor/{{ $data->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0 " onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><span data-feather="x-circle">Hapus</span></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              <!-- End Bordered Table -->
  
            </main>

@endsection