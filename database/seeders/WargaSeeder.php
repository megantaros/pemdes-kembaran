<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\User::create([
            'id_warga' => Str::uuid()->toString(),
            'nama_warga' => 'Gita Megantara',
            'email' => 'megantaragita@gmail.com',
            'notelpon' => '087778667288',
            'nik' => '3304110208970001',
            'kk' => '3304110208970001',
            'ttl' => 'Sijunjung, 25 Januari 1999',
            'jenis_kelamin' => 'Pria',
            'pekerjaan' => 'Mahasiswa',
            'agama' => 'Islam',
            'alamat' => 'Gang Braja RT 001 RW 002, Desa Kembaran, Kebumen, Jawa Tengah',
            'password' => bcrypt('123123123')
        ]);
    }
}