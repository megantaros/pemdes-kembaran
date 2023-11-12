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
            // $table->string('id_warga');
            // $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->string('id_permohonan_surat');
            // $table->foreign('id_permohonan_surat')->references('id_permohonan_surat')->on('permohonan_surat');
            $table->string('foto_surat_ket_pindah_capil');
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
        Schema::dropIfExists('surat_ket_pindah_datang');
    }
};