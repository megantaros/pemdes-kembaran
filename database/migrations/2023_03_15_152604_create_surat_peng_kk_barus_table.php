<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_peng_kk', function (Blueprint $table) {
            $table->bigIncrements('id_surat_peng_kk');
            $table->unsignedBigInteger('id_warga')->unique();
            $table->string('jenis_surat')->default('Surat Pengantar KK');
            // $table->string('nama');
            // $table->string('nik');
            $table->string('kk_lama');
            // $table->string('alamat');
            // $table->string('rt');
            // $table->string('rw');
            $table->string('shdk');
            $table->enum('alasan_permohonan', ['1', '2', '3']);
            $table->bigInteger('jml_angg_keluarga');
            // $table->string('angg_keluarga_1');
            // $table->string('angg_keluarga_2')->nullable();
            // $table->string('angg_keluarga_3')->nullable();
            // $table->string('angg_keluarga_4')->nullable();
            // $table->string('angg_keluarga_5')->nullable();
            // $table->string('angg_keluarga_6')->nullable();
            // $table->string('angg_keluarga_7')->nullable();
            // $table->string('angg_keluarga_8')->nullable();
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('fc_buku_nikah');
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
        Schema::dropIfExists('surat_peng_kk_barus');
    }
};