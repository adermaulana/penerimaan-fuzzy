<?php

namespace App\Http\Controllers;

use App\Models\Ijazah;
use App\Models\Peserta;
use Illuminate\Http\Request;

class AdminIjazahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.ijazah.index',[
            'ijazah' => Ijazah::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.ijazah.create',[
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
            'ijazah' => 'required',
            'foto_kk' => 'image|file|max:1024',
            'surat_lulus' => 'image|file|max:1024',
        ]);

        if($request->foto_kk) {
            $file = $request->foto_kk->getClientOriginalName();
            $image = $request->foto_kk->storeAs('post-images', $file);
            $validatedData['foto_kk'] = $image;
        }

        if($request->surat_lulus) {
            $file = $request->surat_lulus->getClientOriginalName();
            $images = $request->surat_lulus->storeAs('post-images', $file);
            $validatedData['surat_lulus'] = $images;
        }

        Ijazah::create($validatedData);

        return redirect('/dashboard/ijazah')->with('success','Berhasil Menambahkan Nilai Ijazah');
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
        return view('dashboard.ijazah.edit',[
            'ijazah' => $ijazah,
            'nama' => Peserta::all()
        ]);
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'ijazah' => 'required',
            'foto_kk' => 'image|file|max:1024',
            'surat_lulus' => 'image|file|max:1024',
        ]);

        if($request->foto_kk) {
            $file = $request->foto_kk->getClientOriginalName();
            $image = $request->foto_kk->storeAs('post-images', $file);
            $validatedData['foto_kk'] = $image;
        }

        if($request->surat_lulus) {
            $file = $request->surat_lulus->getClientOriginalName();
            $images = $request->surat_lulus->storeAs('post-images', $file);
            $validatedData['surat_lulus'] = $images;
        }

        Ijazah::where('id',$ijazah->id)
        ->update($validatedData);


        return redirect('/dashboard/ijazah')
        ->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ijazah  $ijazah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ijazah $ijazah)
    {
        Ijazah::destroy($ijazah->id);

        return redirect('dashboard/ijazah')
        ->with('success','Data Berhasil Dihapus');
    }
}
