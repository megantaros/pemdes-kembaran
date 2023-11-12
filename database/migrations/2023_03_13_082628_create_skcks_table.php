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
            $table->string('id_permohonan_surat');
            // $table->string('kk');
            $table->enum('kewarganegaraan', ['WNI', 'WNA'])->default('WNI');
            $table->string('keperluan')->default('Mengurus Skck');
            $table->string('fc_ktp');
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
        Schema::dropIfExists('skck');
    }
};