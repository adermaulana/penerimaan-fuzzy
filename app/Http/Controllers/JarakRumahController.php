<?php

namespace App\Http\Controllers;

use App\Models\JarakRumah;
use Illuminate\Http\Request;
use App\Models\Ijazah;
use App\Models\Peserta;
use App\FIS\Fuzzy;
use App\Models\MenuHasil;
use App\Models\Rapor;
use App\Models\HasilTes;

class JarakRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jarak_rumah',[
            'title' => 'Data Jarak Rumah'
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

        $auth = auth('peserta')->user();

        if (!$auth) {
            // Jika pengguna belum terotentikasi, redirect ke halaman login atau tampilkan pesan sesuai kebutuhan Anda
            return redirect('/login')->with('loginError', 'Anda belum login. Silakan login terlebih dahulu.');
        }

        $validatedData = $request->validate([
            'nama_kabupaten' => 'required',
            'nama_kecamatan' => 'required',
            'alamat' => 'required',
            'jarak_rumah' => 'required',
            ]);

            $existingJarak = JarakRumah::where('id_peserta', $auth->id)->first();
        
            if ($existingJarak) {
                // If a record already exists, you can handle it accordingly.
                // For example, redirect back with an error message.
                return redirect()->back()->with('error', 'Data sudah ada untuk peserta ini.');
            }

            $validatedData['id_peserta'] = $auth->id;

            JarakRumah::create($validatedData);

            $phuzzy = new Fuzzy;

            $phuzzy->clearMembers();
            
            $phuzzy->setInputNames(['ijazah', 'rapor']);
            
            //Fuzzifikasi
            $phuzzy->addMember('ijazah', 'rendah',  0, 30, 50, 'LEFT_INFINITY');
            $phuzzy->addMember('ijazah', 'sedang', 51, 65, 75, 'TRIANGLE');
            $phuzzy->addMember('ijazah', 'tinggi', 76, 85, 100, 'RIGHT_INFINITY');
    
            $phuzzy->addMember('rapor', 'rendah',  0, 30, 50, 'LEFT_INFINITY');
            $phuzzy->addMember('rapor', 'sedang', 51, 65, 75, 'TRIANGLE');
            $phuzzy->addMember('rapor', 'tinggi', 76, 85, 100, 'RIGHT_INFINITY');
    
            $phuzzy->addMember('jarak', 'dekat',  0, 2, 3, 'LEFT_INFINITY');
            $phuzzy->addMember('jarak', 'sedang', 4, 5, 6, 'TRIANGLE');
            $phuzzy->addMember('jarak', 'jauh', 7, 8, 50, 'RIGHT_INFINITY');
    
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
            }
            
            if ($existingRecord) {
                // If exists, update the existing record
                $existingRecord->update(['keterangan' => $nilai]);
                
            } elseif ($id_peserta) {
                // If not exists and id_peserta is not null, create a new record
                HasilTes::create([
                    'id_peserta' => $id_peserta,
                    'keterangan' => $nilai
                ]);
            }

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
