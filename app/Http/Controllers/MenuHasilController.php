<?php

namespace App\Http\Controllers;

use App\FIS\Fuzzy;
use App\Models\MenuHasil;
use Illuminate\Http\Request;
use App\Models\Rapor;
use App\Models\HasilTes;
use App\Models\Ijazah;
use App\Models\Peserta;
use App\Models\JarakRumah;

class MenuHasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $phuzzy = new Fuzzy;

		$phuzzy->clearMembers();
		
		$phuzzy->setInputNames(['ijazah', 'rapor','jarak']);
		
        //Fuzzifikasi
		$phuzzy->addMember('ijazah', 'rendah',  0, 30, 50, 'LEFT_INFINITY');
		$phuzzy->addMember('ijazah', 'sedang', 51, 65, 75, 'TRIANGLE');
		$phuzzy->addMember('ijazah', 'tinggi', 76, 85, 100, 'RIGHT_INFINITY');

		$phuzzy->addMember('rapor', 'rendah',  0, 30, 50, 'LEFT_INFINITY');
		$phuzzy->addMember('rapor', 'sedang', 51, 65, 75, 'TRIANGLE');
		$phuzzy->addMember('rapor', 'tinggi', 76, 85, 100, 'RIGHT_INFINITY');

        $phuzzy->addMember('jarak', 'dekat',  0, 3, 5, 'LEFT_INFINITY');
		$phuzzy->addMember('jarak', 'sedang', 6, 7, 10, 'TRIANGLE');
		$phuzzy->addMember('jarak', 'jauh', 11, 50, 100, 'RIGHT_INFINITY');

		$phuzzy->SetOutputNames(array('hasil'));

		$phuzzy->addMember('hasil', 'tidak_lulus',  0, 30, 50, 'LEFT_INFINITY');
		$phuzzy->addMember('hasil', 'lulus', 51, 65, 75, 'TRIANGLE');
		$phuzzy->addMember('hasil', 'lulus', 76, 85, 100, 'RIGHT_INFINITY');

		$phuzzy->clearRules();

        //Inferensi
		$phuzzy->addRule('IF ijazah.rendah AND rapor.rendah AND jarak.jauh THEN hasil.tidak_lulus');
		$phuzzy->addRule('IF ijazah.sedang AND rapor.sedang AND jarak.dekat THEN hasil.lulus');
		$phuzzy->addRule('IF ijazah.tinggi AND rapor.tinggi AND jarak.dekat THEN hasil.lulus');
		$phuzzy->addRule('IF ijazah.rendah AND rapor.sedang AND jarak.jauh THEN hasil.tidak_lulus');
		$phuzzy->addRule('IF ijazah.tinggi AND rapor.rendah AND jarak.dekat THEN hasil.lulus');
		$phuzzy->addRule('IF ijazah.sedang AND rapor.rendah AND jarak.jauh THEN hasil.tidak_lulus');

        $nilai_ijazah = Ijazah::latest()->first();
        $nilai_rapor = Rapor::latest()->first();
        $nilai_jarak = JarakRumah::latest()->first();

        $rata_rata = ($nilai_rapor->semester_1 + $nilai_rapor->semester_2 + $nilai_rapor->semester_3 + $nilai_rapor->semester_4 + $nilai_rapor->semester_5 + $nilai_rapor->semester_6 ) / 6;

		$phuzzy->setRealInput('ijazah', $nilai_ijazah->ijazah);
		$phuzzy->setRealInput('rapor', $rata_rata);
		$phuzzy->setRealInput('jarak', $nilai_jarak->jarak_rumah);

        $auth = auth('peserta')->user();
        $id_peserta = $auth->id;

        
		$result = $phuzzy->Execute();
        $nilai = $result['hasil'];
        
        $existingRecord = null;

        if ($id_peserta) {
            $existingRecord = HasilTes::where('id_peserta', $id_peserta)->first();
        } elseif ($id_peserta) {
            // If not exists and id_peserta is not null, create a new record
            HasilTes::create([
                'id_peserta' => $id_peserta,
                'keterangan' => $nilai
            ]);
        }

        return view('menu_hasil',[
            'hasil' => $result,
            'title' => 'Data Hasil',
            'hasil_tes' => HasilTes::latest()->get(),
            'hasil_tampil' => HasilTes::get()->first()
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
     * @param  \App\Models\MenuHasil  $menuHasil
     * @return \Illuminate\Http\Response
     */
    public function show(MenuHasil $menuHasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuHasil  $menuHasil
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuHasil $menuHasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuHasil  $menuHasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuHasil $menuHasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuHasil  $menuHasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuHasil $menuHasil)
    {
        //
    }
}
