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
        Schema::create('surat_peng_kk', function (Blueprint $table) {
            $table->uuid('id_surat_peng_kk')->primary();
            $table->string('id_permohonan_surat');
            $table->enum('alasan_permohonan', ['1', '2', '3']);
            $table->enum('shdk', ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lainnya', 'Pembantu']);
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('fc_buku_nikah');
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
        Schema::dropIfExists('surat_peng_kk_barus');
    }
};