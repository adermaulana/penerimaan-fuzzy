<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\Peserta;
use Illuminate\Http\Request;

class AdminDataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            return view('dashboard.data_siswa.index',[
                'datasiswa' => DataSiswa::all()
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.data_siswa.create',[
            'nama' => Peserta::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required',
        ]);

        DataSiswa::create($validatedData);

        return redirect('/dashboard/data_siswa')->with('success','Berhasil Menambahkan Data Siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataSiswa  $dataSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(DataSiswa $dataSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataSiswa  $dataSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(DataSiswa $dataSiswa)
    {
        return view('dashboard.data_siswa.edit',[
            'datasiswa' => $dataSiswa,
            'nama' => Peserta::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataSiswa  $dataSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataSiswa $dataSiswa)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required',
        ]);

        DataSiswa::where('id',$dataSiswa->id)
        ->update($validateData);


        return redirect('/dashboard/data_siswa')
        ->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataSiswa  $dataSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataSiswa $dataSiswa)
    {
        DataSiswa::destroy($dataSiswa->id);

        return redirect('dashboard/data_siswa')
        ->with('success','Data Berhasil Dihapus');
    }

   
}
