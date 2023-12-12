<?php

namespace App\Http\Controllers;

use App\Models\Ijazah;
use Illuminate\Http\Request;
use App\Models\Peserta;

class IjazahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ijazah',[
            'title' => 'Data Ijazah'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $auth = auth('peserta')->user();

        if (!$auth) {
            // Jika pengguna belum terotentikasi, redirect ke halaman login atau tampilkan pesan sesuai kebutuhan Anda
            return redirect('/login')->with('loginError', 'Anda belum login. Silakan login terlebih dahulu.');
        }
        
        $validatedData = $request->validate([
            'ijazah' => 'required|max:255',
            'surat_lulus' => 'image|file|max:1024'
        ]);


        if($request->surat_lulus) {
            $file = $request->surat_lulus->getClientOriginalName();
            $images = $request->surat_lulus->storeAs('post-images', $file);
            $validatedData['surat_lulus'] = $images;
        }

        $validatedData['id_peserta'] = $auth->id;

        Ijazah::create($validatedData);

        return redirect('/ijazah')->with('success','New Post has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ijazah  $ijazah
     * @return \Illuminate\Http\Response
     */
    public function show(Ijazah $ijazah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ijazah  $ijazah
     * @return \Illuminate\Http\Response
     */
    public function edit(Ijazah $ijazah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ijazah  $ijazah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ijazah $ijazah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ijazah  $ijazah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ijazah $ijazah)
    {
        //
    }
}
