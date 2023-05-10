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
        // Schema::create('warga', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->string('notelpon')->nullable();
        //     $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
        //     $table->string('pekerjaan')->nullable();
        //     $table->string('alamat')->nullable();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('warga', function (Blueprint $table) {
            $table->bigIncrements('id_warga');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('notelpon')->nullable();
            $table->string('nik')->nullable();
            $table->string('ttl')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->string('pekerjaan')->nullable();
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindhu', 'Budha'])->default('Islam');
            $table->string('alamat')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('warga');
    }
};