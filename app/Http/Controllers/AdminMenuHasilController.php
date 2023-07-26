<?php

namespace App\Http\Controllers;

use App\Models\MenuHasil;
use App\Models\Ijazah;
use App\Models\Rapor;
use App\Models\JarakRumah;
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
    
        $Ijazah = ijazah;
        $nilaiRapor = $this->nilaiRataRata(semester_1 + $data->semester_2 + $data->semester_3 + $data->semester_4 + $data->semester_5 + $data->semester_6) / 6;
        $jarakRumah = jarak_rumah;

    {
        if (($ijazah >= 0 && $ijazah <= 40) && ($nilaiRapor >= 0 && $nilaiRapor <= 40) && ($jarakRumah >= 7 && $jarakRumah <= 10)) {
            $statusKelulusan = 'Tidak Lulus';
        } elseif (($ijazah >= 41 && $ijazah <= 75) && ($nilaiRapor >= 41 && $nilaiRapor <= 75) && ($jarakRumah >= 0 && $jarakRumah <= 3)) {
            $statusKelulusan = 'Lulus';
        } elseif (($ijazah >= 76 && $ijazah <= 100) && ($nilaiRapor >= 76 && $nilaiRapor <= 100) && ($jarakRumah >= 0 && $jarakRumah <= 3)) {
            $statusKelulusan = 'Lulus';
        } elseif (($ijazah >= 0 && $ijazah <= 40) && ($nilaiRapor >= 41 && $nilaiRapor <= 75) && ($jarakRumah >= 7 && $jarakRumah <= 10)) {
            $statusKelulusan = 'Tidak Lulus';
        } elseif (($ijazah >= 76 && $ijazah <= 100) && ($nilaiRapor >= 0 && $nilaiRapor <= 40) && ($jarakRumah >= 0 && $jarakRumah <= 3)) {
            $statusKelulusan = 'Lulus';
        } elseif (($ijazah >= 41 && $ijazah <= 75) && ($nilaiRapor >= 0 && $nilaiRapor <= 40) && ($jarakRumah >= 7 && $jarakRumah <= 10)) {
            $statusKelulusan = 'Tidak Lulus';
        } else {
            // Default jika tidak masuk ke salah satu kondisi di atas
            $statusKelulusan = 'Tidak Lulus';
        }

    }

        return view('dashboard.kelulusan.index',[
            'menu_hasil' => MenuHasil::all()
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
}
