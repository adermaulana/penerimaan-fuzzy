<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Peserta;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Titing',
            'email' => 'titing@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        Peserta::create([
            'nama' => 'Titing',
            'nisn' => '12345678',
            'email' => '12345678',
            'jenis_kelamin' => 'wanita',
            'tempat_lahir' => 'Makassar',
            'tanggal_lahir' => date('Y-m-d'),
            'asal_sekolah' => 'SMKN',
            'password' => bcrypt('12345'),
        ]);
    }
}
