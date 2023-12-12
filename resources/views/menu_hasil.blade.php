@extends('layouts.main')

@section('container')

<div class="container" style="margin-top: 130px">
<div class="col-lg-13">
<div class="row justify-content-center">
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Pengumuman Kelulusan</h4></b>

    <!-- Table with stripped rows -->
    @if($hasil_tampil->status == 'Tidak Tampil')
      <h6> <marquee behavior="" direction=""><b>Untuk Pengumuman Kelulusan Akan Di Infokan Secepatnya pada laman ini!</b></marquee></h6>
    @else
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
      @foreach($hasil_tes as $data)
      <tr>
          <th scope="row"> {{ $loop->iteration }} </th>
          <td> {{ $data->peserta->nama }} </td>
          <td> {{ $data->peserta->nisn }} </td>
          <td> {{ $data->peserta->asal_sekolah }} </td>
          @if($data->keterangan > 60)
          <td><b class="text-success">Lulus</b></td>
          @else
          <td><b class="text-danger">Tidak Lulus</b></td>
          @endif
      </tr>
    @endforeach  
    @endif
      </tbody>
    </table>
</div>
</div>

    @endsection