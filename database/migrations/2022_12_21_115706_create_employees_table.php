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
        // Schema::create('employees', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama');
        //     $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
        //     $table->string('notelpon');
        //     $table->string('foto');
        //     $table->timestamps();
        // });
        Schema::dropIfExists('employees');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};