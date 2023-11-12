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
            // $table->string('id_warga');
            // $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->string('id_permohonan_surat');
            // $table->foreign('id_permohonan_surat')->references('id_permohonan_surat')->on('permohonan_surat');
            // $table->string('kk_lama');
            $table->string('shdk');
            $table->enum('alasan_permohonan', ['1', '2', '3']);
            $table->bigInteger('jml_angg_keluarga');
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