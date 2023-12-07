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
            $table->string('id_permohonan_surat');
            // $table->string('kk');
            $table->string('alamat_domisili');
            $table->string('pengantar_rt');
            $table->string('fc_ktp');
            $table->string('fc_kk');
            $table->string('foto_lokasi');
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
        Schema::dropIfExists('domisilis');
    }
};