<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\DataSiswa;

class AdminPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.peserta.index',[
            'datasiswa' => Peserta::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.peserta.create',[
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

        return redirect('/dashboard/peserta')->with('success','Berhasil Menambahkan Data Siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datasiswa = Peserta::FindOrFail($id);
        return view('dashboard.peserta.edit',[
            'datasiswa' => $datasiswa,
            'nama' => Peserta::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datasiswa = Peserta::FindOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required',
        ]);

        Peserta::where('id',$datasiswa->id)
        ->update($validatedData);

        return redirect('/dashboard/peserta')
        ->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datasiswa = Peserta::FindOrFail($id);
        Peserta::destroy($datasiswa->id);

        return redirect('dashboard/peserta')
        ->with('success','Data Berhasil Dihapus');
    }

    public function downloadpdf()
    {
        $data = Peserta::limit(20)->get();
        $pdf = PDF::loadview('bukti-daftar-pdf',compact('data'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('bukti_daftar.pdf');
    }
}
