<?php

namespace App\Http\Controllers;

use App\Models\Rapor;
use Illuminate\Http\Request;
use App\Models\Peserta;

class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.rapor');
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
            'semester_1' => 'required',
            'semester_2' => 'required',
            'semester_3' => 'required',
            'semester_4' => 'required',
            'semester_5' => 'required',
            'semester_6' => 'required',
            'foto_rapor' => 'image|file|max:1024',
            'id_peserta' => 'required'
            ]);

            if($request->foto_rapor) {
                $file = $request->foto_rapor->getClientOriginalName();
                $image = $request->foto_rapor->storeAs('post-images', $file);
                $validatedData['foto_rapor'] = $image;
            }

            Rapor::create($validatedData);
            return redirect('/rapor')
            ->with('success','Rapor Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rapor  $rapor
     * @return \Illuminate\Http\Response
     */
    public function show(Rapor $rapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rapor  $rapor
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapor $rapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rapor  $rapor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rapor $rapor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rapor  $rapor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rapor $rapor)
    {
        //
    }
}
