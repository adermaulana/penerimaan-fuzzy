<?php

namespace App\Http\Controllers;

use App\Models\MenuHasil;
use App\Models\Ijazah;
use App\Models\Rapor;
use App\Models\HasilTes;
use Illuminate\Http\Request;

class AdminMenuHasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kelulusan.index',[
            'title' => 'Kelulusan',
            'hasil_tes' => HasilTes::latest()->get()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menu_hasil  $menu_hasil
     * @return \Illuminate\Http\Response
     */
    public function show(menu_hasil $menu_hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu_hasil  $menu_hasil
     * @return \Illuminate\Http\Response
     */
    public function edit(menu_hasil $menu_hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\menu_hasil  $menu_hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menu_hasil $menu_hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menu_hasil  $menu_hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu_hasil $menu_hasil)
    {
        //
    }

    public function tampil(){

        HasilTes::query()->update(['status' => 'Tampil']);

        // Optionally, you can redirect or return a response
        return redirect()->back()->with('success', 'Berhasil Mengubah!');

    }

    public function tidaktampil(){

        HasilTes::query()->update(['status' => 'Tidak Tampil']);

        // Optionally, you can redirect or return a response
        return redirect()->back()->with('success', 'Berhasil Mengubah!');

    }
}
