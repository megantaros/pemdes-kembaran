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
        Schema::create('surat_ket_domisili', function (Blueprint $table) {
            $table->uuid('id_surat_ket_domisili')->primary();
            $table->string('id_warga')->unique();
            // $table->bigInteger('id_surat_pengajuan')->unique();
            $table->string('jenis_surat')->default('Surat Keterangan Domisili');
            $table->string('kk');
            $table->string('alamat_domisili');
            $table->string('pengantar_rt');
            $table->string('fc_ktp');
            $table->string('fc_kk');
            $table->string('foto_lokasi');
            // $table->enum('status', ['Terkirim', 'Diterima', 'Ditolak'])->default('Terkirim');
            $table->timestamps();

            $table->foreign('id_warga')->references('id_warga')->on('warga');
            // $table->foreign('jenis_surat')->references('jenis_surat')->on('surat_pengajuan');
        });
    }
    // public function up()
    // {
    //     Schema::create('domisilis', function (Blueprint $table) {
    //         $table->id();
    //         $table->int();
    //         $table->string('ktp');
    //         $table->string('kk');
    //         $table->string('lokasi');
    //         $table->enum('status', ['Terkirim', 'Diterima', 'Ditolak'])->default('Terkirim');
    //         $table->timestamps();
    //         $table->foreign('user_id')->references('id')->on('users');
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domisilis');
    }
};