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
        Schema::create('surat_peng_skck', function (Blueprint $table) {
            $table->uuid('id_surat_peng_skck')->primary();
            $table->string('id_warga')->unique();
            $table->string('jenis_surat')->default('Surat Pengantar SKCK');
            // $table->string('nama');
            // $table->string('nik');
            $table->string('kk');
            // $table->string('ttl');
            // $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindhu', 'Budha'])->default('Islam');
            // $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->default('Pria');
            $table->enum('kewarganegaraan', ['WNI', 'WNA'])->default('WNI');
            $table->string('keperluan')->default('Mengurus Skck');
            $table->string('fc_ktp');
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
        Schema::dropIfExists('skck');
    }
};