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
        Schema::create('permohonan_surat', function (Blueprint $table) {
            $table->uuid('id_permohonan_surat')->primary();
            $table->string('id_warga');
            $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->string('jenis_surat');
            $table->date('tanggal');
            $table->string('keterangan_warga')->nullable();
            $table->string('keterangan_admin')->nullable();
            $table->enum('status', [1, 2, 3, 4, 5, 6])->default(1);
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