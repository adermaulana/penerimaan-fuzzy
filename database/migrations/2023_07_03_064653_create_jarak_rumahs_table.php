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
            $table->string('nama')->nullable();
            $table->string('nama_kabupaten');
            $table->string('nama_kecamatan');
            $table->string('alamat');
            $table->string('jarak_rumah');
            $table->timestamps();
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
