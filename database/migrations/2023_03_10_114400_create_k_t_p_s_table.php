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
        Schema::create('surat_peng_ktp', function (Blueprint $table) {
            $table->bigIncrements('id_surat_peng_ktp');
            $table->unsignedBigInteger('id_warga')->unique();
            $table->string('jenis_surat')->default('Surat Pengantar KTP');
            $table->enum('jenis_permohonan', ['Baru', 'Perpanjangan', 'Penggantian'])->nullable();
            // $table->string('nama');
            // $table->string('kk');
            $table->string('kk');
            // $table->string('alamat');
            // $table->string('rt');
            // $table->string('rw');
            // $table->string('kode_pos');
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
        Schema::dropIfExists('ktp');
    }
};