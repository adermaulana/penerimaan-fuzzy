<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJarakRumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jarak_rumahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peserta');
            $table->string('nama_kabupaten');
            $table->string('nama_kecamatan');
            $table->string('alamat');
            $table->float('jarak_rumah');
            $table->timestamps();

            $table->foreign('id_peserta')->references('id')->on('pesertas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jarak_rumahs');
    }
}
