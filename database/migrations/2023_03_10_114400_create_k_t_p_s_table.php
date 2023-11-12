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
        Schema::create('surat_peng_ktp', function (Blueprint $table) {
            $table->uuid('id_surat_peng_ktp')->primary();
            $table->string('id_permohonan_surat');
            $table->enum('jenis_permohonan', ['Baru', 'Perpanjangan', 'Penggantian'])->nullable();
            // $table->string('kk');
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
        Schema::dropIfExists('ktp');
    }
};