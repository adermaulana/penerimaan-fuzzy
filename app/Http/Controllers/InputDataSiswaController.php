<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class InputDataSiswaController extends Controller
{
    public function create(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required'
        ]);

        Peserta::create($validatedData);

        return redirect('/')->with('success','Berhasil Menambahkan Data');
    }
}
