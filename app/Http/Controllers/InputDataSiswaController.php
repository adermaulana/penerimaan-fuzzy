<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class InputDataSiswaController extends Controller
{
    public function create(Request $request){

        $auth = auth('peserta')->user();

        if (!$auth) {
            // Jika pengguna belum terotentikasi, redirect ke halaman login atau tampilkan pesan sesuai kebutuhan Anda
            return redirect('/login')->with('loginError', 'Anda belum login. Silakan login terlebih dahulu.');
        }

        $validatedData = $request->validate([
            'nisn' => 'required|unique:pesertas',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required'
        ]);

        $validatedData['id'] = $auth->id;

        Peserta::where('id', $auth->id)->update($validatedData);

        return redirect('/')->with('success','Berhasil Menambahkan Data');
    }


}
