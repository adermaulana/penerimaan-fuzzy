<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peserta');
            $table->float('semester_1')->nullable();
            $table->float('semester_2')->nullable();
            $table->float('semester_3')->nullable();
            $table->float('semester_4')->nullable();
            $table->float('semester_5')->nullable();
            $table->float('semester_6')->nullable();
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
        Schema::dropIfExists('rapors');
    }
}
