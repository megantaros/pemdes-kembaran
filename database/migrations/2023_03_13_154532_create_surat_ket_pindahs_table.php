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
        Schema::create('surat_ket_pindah', function (Blueprint $table) {
            $table->uuid('id_surat_ket_pindah')->primary();
            $table->string('id_permohonan_surat');
            $table->string('nama_kepala_keluarga');
            $table->enum('alasan_pindah', ['Pekerjaan', 'Pendidikan', 'Keamanan', 'Kesehatan', 'Perumahan', 'Keluarga', 'Lainnya']);
            $table->string('lainnya')->nullable();
            $table->string('alamat_tujuan');
            $table->enum('shdk', ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lainnya', 'Pembantu']);
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('pengantar_rt');
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
        Schema::dropIfExists('surat_ket_pindah');
    }
};