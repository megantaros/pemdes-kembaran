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
        Schema::create('surat_pengajuan', function (Blueprint $table) {
            $table->uuid('id_surat_pengajuan')->primary();
            $table->string('id_warga');
            $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->string('id_surat')->nullable();
            $table->string('jenis_surat');
            $table->date('tanggal_permohonan')->default(now());
            $table->string('keterangan_warga')->nullable();
            $table->string('keterangan_admin')->nullable();
            $table->enum('status', ['Terkirim', 'Diterima', 'Ditolak'])->default('Terkirim');
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
        Schema::dropIfExists('surat_pengajuan');
    }
};