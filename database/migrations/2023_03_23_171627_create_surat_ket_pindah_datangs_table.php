<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_ket_pindah_datang', function (Blueprint $table) {
            $table->uuid('id_surat_ket_pindah_datang')->primary();
            $table->string('id_warga')->unique();
            $table->string('jenis_surat')->default('Surat Keterangan Pindah Datang');
            $table->string('foto_surat_ket_pindah_capil');
            $table->timestamps();

            $table->foreign('id_warga')->references('id_warga')->on('warga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_ket_pindah_datang');
    }
};