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
            $table->string('id_warga')->unique();
            $table->string('jenis_surat')->default('Surat Keterangan Pindah');
            $table->string('kk');
            // $table->string('nik');
            $table->string('nama_kepala_keluarga');
            // $table->string('alamat_asal');
            // $table->enum('klasifikasi_kepindahan', ['Dalam Satu Desa/Kelurahan', 'Antar Desa/Kelurahan', 'Antar Kecamatan', 'Antar Kabupaten', 'Antar Provinsi']);
            // $table->string('nama');
            $table->enum('alasan_pindah', ['Pekerjaan', 'Pendidikan', 'Keamanan', 'Kesehatan', 'Perumahan', 'Keluarga', 'Lainnya']);
            $table->string('lainnya')->nullable();
            $table->string('alamat_tujuan');
            $table->string('jml_angg_pindah');
            // $table->string('jenis_kepindahan');
            // $table->enum('status_kk_tidak_pindah', ['Numpang KK', 'Membuat KK Baru', 'Nomor KK Tetap']);
            // $table->enum('status_kk_pindah', ['Numpang KK', 'Membuat KK Baru', 'Nomor KK Tetap']);
            $table->string('shdk');
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('pengantar_rt');
            // $table->enum('status', ['Terkirim', 'Diterima', 'Ditolak'])->default('Terkirim');
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
        Schema::dropIfExists('surat_ket_pindah');
    }
};