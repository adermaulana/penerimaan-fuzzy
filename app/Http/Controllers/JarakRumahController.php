<?php

namespace App\Http\Controllers;

use App\Models\JarakRumah;
use Illuminate\Http\Request;

class JarakRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.jarak_rumah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_kabupaten' => 'required',
            'nama_kecamatan' => 'required',
            'alamat' => 'required',
            'jarak_rumah' => 'required'
            ]);

            JarakRumah::create($validatedData);
            return redirect('/jarak_rumah')
            ->with('success','Jarak Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JarakRumah  $jarakRumah
     * @return \Illuminate\Http\Response
     */
    public function show(JarakRumah $jarakRumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JarakRumah  $jarakRumah
     * @return \Illuminate\Http\Response
     */
    public function edit(JarakRumah $jarakRumah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JarakRumah  $jarakRumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JarakRumah $jarakRumah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JarakRumah  $jarakRumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(JarakRumah $jarakRumah)
    {
        //
    }
}
