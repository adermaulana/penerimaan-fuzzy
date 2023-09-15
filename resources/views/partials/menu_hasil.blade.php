@extends('layouts.main')

@section('container')

<div class="container" style="margin-top: 130px">
<div class="col-lg-13">
<div class="row justify-content-center">
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Pengumuman Kelulusan</h5></b>

    <!-- Table with stripped rows -->
    <table class="table table-striped">
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
        @foreach($peserta as $data)
        <tr>
          <th scope="row"> {{ $loop->iteration }} </th>
          <td> {{ $data->nama }} </td>
          <td> {{ $data->nisn }} </td>
          <td> {{ $data->asal_sekolah }} </td>
          @foreach ($hasil as $data2)
          @if($data2 >= 60)
          <td>Lulus</td>
          @else
          <td>Tidak Lulus</td>
          @endif
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
</div>

    @endsection