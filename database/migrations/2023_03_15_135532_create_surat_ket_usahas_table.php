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
        Schema::create('surat_ket_usaha', function (Blueprint $table) {
            $table->uuid('id_surat_ket_usaha')->primary();
            // $table->string('id_warga');
            // $table->foreign('id_warga')->references('id_warga')->on('warga');
            $table->string('id_permohonan_surat');
            // $table->foreign('id_permohonan_surat')->references('id_permohonan_surat')->on('permohonan_surat');
            $table->enum('kewarganegaraan', ['WNI', 'WNA'])->default('WNI');
            $table->enum('status_pernikahan', ['Kawin', 'Belum Kawin'])->default('Belum Kawin');
            $table->string('jenis_usaha');
            $table->string('tempat_usaha');
            $table->string('lama_usaha');
            $table->string('pengantar_rt');
            $table->string('fc_ktp');
            $table->string('fc_kk');
            $table->string('foto_usaha');
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
        Schema::dropIfExists('surat_ket_usahas');
    }
};