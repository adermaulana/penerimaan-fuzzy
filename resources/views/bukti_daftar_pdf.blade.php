

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nisn</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">Tombol Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($datasiswa as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nisn}}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->asal_sekolah }}</td>
                    <td>
        
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Bordered Table -->
