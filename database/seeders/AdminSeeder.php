<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin')->insert([
            'id_admin' => Str::uuid()->toString(),
            'nama_admin' => 'Rian Megarandra',
            'email' => 'admin1@gmail.com',
            'notelpon' => '081234567890',
            'jabatan' => 'Kasi Pemerintahan',
            'jenis_kelamin' => 'Pria',
            'alamat' => 'Gang Braja RT 01 RW 02, Desa Kembaran, Kebumen, Jawa Tengah',
            'password' => Hash::make('123')
        ]);
    }
}