<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjazahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijazahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peserta');
            $table->float('ijazah');
            $table->string('surat_lulus');
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
        Schema::dropIfExists('ijazahs');
    }
}
