<?php

namespace App\Http\Controllers;

use App\Models\JarakRumah;
use App\Models\Peserta;
use Illuminate\Http\Request;

class AdminJarakRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jarak_rumah.index',[
            'jarakrumah' => JarakRumah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jarak_rumah.create',[
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
            'id_peserta' => 'required',
            'nama_kabupaten' => 'required',
            'nama_kecamatan' => 'required',
            'alamat' => 'required',
            'jarak_rumah' => 'required',
            'foto_kk' => 'image|file|max:1024',
        ]);

        if($request->foto_kk) {
            $file = $request->foto_kk->getClientOriginalName();
            $image = $request->foto_kk->storeAs('post-images', $file);
            $validatedData['foto_kk'] = $image;
        }

        JarakRumah::create($validatedData);

        return redirect('/dashboard/jarak_rumah')->with('success','Berhasil Menambahkan Jarak Rumah');
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
        return view('dashboard.jarak_rumah.edit',[
            'jarakrumah' => $jarakRumah,
            'nama' => Peserta::all()
        ]);
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'nama_kabupaten' => 'required',
            'nama_kecamatan' => 'required',
            'alamat' => 'required',
            'jarak_rumah' => 'required',
            'foto_kk' => 'image|file|max:1024',
        ]);

        if($request->foto_kk) {
            $file = $request->foto_kk->getClientOriginalName();
            $image = $request->foto_kk->storeAs('post-images', $file);
            $validatedData['foto_kk'] = $image;
        }


        JarakRumah::where('id',$jarakRumah->id)
        ->update($validatedData);


        return redirect('/dashboard/jarak_rumah')
        ->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JarakRumah  $jarakRumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(JarakRumah $jarakRumah)
    {
        JarakRumah::destroy($jarakRumah->id);

        return redirect('dashboard/jarak_rumah')
        ->with('success','Data Berhasil Dihapus');
    }
}
